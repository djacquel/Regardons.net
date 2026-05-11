<?php

// The Article model talks to the "articles" table automatically.
// Laravel convention: Model name (singular) → table name (plural).

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // $fillable lists the columns that can be filled from form input.
    // This protects against "mass-assignment" security attacks.
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'slug',
    ];

    // Relationship: an article BELONGS TO one user (its author)
    // Usage: $article->author->username
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}