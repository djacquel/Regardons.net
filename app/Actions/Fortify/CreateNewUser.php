<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     *
     * @throws ValidationException
     */
   

    // This method is called by Laravel Fortify when a user submits the register form.
// It receives all submitted form data inside the $input array.
// Example: $input['prenom'], $input['nom'], $input['email'], $input['password']
public function create(array $input): User
{
    // Validator::make(...) creates a validator instance.
    // It checks the submitted form data ($input) against the rules below.
    Validator::make($input, [

        // 'prenom' is required:
        // - required = the field must not be empty
        // - string = the value must be text
        // - max:255 = the text cannot be longer than 255 characters
        'prenom' => ['required', 'string', 'max:255'],

        // 'nom' has the same rules as 'prenom'
        // It also must be filled, must be text, and must not exceed 255 characters
        'nom' => ['required', 'string', 'max:255'],

        // 'email' validation rules:
        // - required = user must enter an email
        // - string = treat it as text
        // - email = must be in a valid email format
        // - max:255 = cannot be too long
        // - Rule::unique(User::class) = this email must not already exist
        //   in the users table for the User model
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],

        // 'password' uses the Fortify password rules from PasswordValidationRules trait
        // This usually checks things like:
        // - required
        // - minimum length
        // - confirmed (must match password_confirmation field)
        'password' => $this->passwordRules(),

    // ->validate() actually runs the validation.
    // If any rule fails, Laravel stops here and sends the user back to the form
    // with error messages.
    // If validation passes, the code continues to the User::create(...) part.
    ])->validate();


    // If validation is successful, create a new user in the database.
    return User::create([

        // Save the 'name' column in the users table.
        // Here you are combining first name (prenom) and last name (nom)
        // into one full name string, with a space in between.
        // Example:
        // prenom = "Marie"
        // nom = "Dupont"
        // result = "Marie Dupont"
        'name' => $input['prenom'].' '.$input['nom'],

        // Save the email entered in the form into the 'email' column
        'email' => $input['email'],

        // Never save a password as plain text.
        // Hash::make(...) converts the real password into a secure hashed version
        // before storing it in the database.
        'password' => Hash::make($input['password']),
    ]);
}
}

