@extends('layouts.app')

{{-- 
    This starts the content section.
    Everything inside this block will be inserted
    into @yield('content') from your main layout.
--}}
@section('content')

<section class="register-section">
    <div class="register-container">

        {{-- LEFT PANEL
             This side contains:
             - the logo
             - the image block
             - the small marketing text--}}
        <div class="register-left">

            {{-- Logo area at the top left --}}
            <div class="register-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Regardons" class="register-logo">
            </div>

            {{-- 
                Image block.
                Replace register-image.jpg with your real file name
                inside public/images/
            --}}
            <div class="register-image-wrapper">
                <img 
                    src="{{ asset('images/register-image.jpg') }}" 
                    alt="Illustration nature Regardons" 
                    class="register-image"
                >
            </div>

            {{-- Left panel title --}}
            <h2 class="register-left-title">Créez votre espace nature</h2>

            {{-- Left panel description --}}
            <p class="register-left-text">
                Rejoignez 1,200 passionnés qui partagent leur regard sur la faune et la flore française.
            </p>
        </div>

        {{--  RIGHT PANEL This side contains the registration form --}}
        <div class="register-right">

            {{-- Main form heading --}}
            <h1 class="register-title">Créer un compte</h1>

            {{-- Small intro text under the title --}}
            <p class="register-subtitle">
                Commencez à partager votre regard sur la nature
            </p>

            {{-- 
                Main registration form.
                route('register') is provided by Laravel Fortify.
                method POST sends form data securely to the server.
            --}}
            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf

                {{-- Username / display name field --}}
                <div class="form-group">
                    <label for="username">NOM D'UTILISATEUR</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        value="{{ old('username') }}"
                        placeholder="marie_photo"
                    >
                </div>

                {{-- First name + last name on one row --}}
                <div class="form-row">
                    <div class="form-group">
                        <label for="prenom">PRÉNOM</label>
                        <input 
                            type="text" 
                            id="prenom" 
                            name="prenom" 
                            value="{{ old('prenom') }}"
                            placeholder="Marie"
                        >
                    </div>

                    <div class="form-group">
                        <label for="nom">NOM</label>
                        <input 
                            type="text" 
                            id="nom" 
                            name="nom" 
                            value="{{ old('nom') }}"
                            placeholder="Dupont"
                        >
                    </div>
                </div>

                {{-- Email field --}}
                <div class="form-group">
                    <label for="email">ADRESSE EMAIL</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="marie@exemple.fr"
                    >
                </div>

                {{-- Password + password confirmation --}}
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">MOT DE PASSE</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="••••••••"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">CONFIRMER</label>
                        <input 
                            type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            placeholder="••••••••"
                        >
                    </div>
                </div>

                {{-- Terms and privacy agreement --}}
                <div class="checkbox-row">
                    <input type="checkbox" id="terms" name="terms">
                    <label for="terms">
                        J'accepte les <a href="#">conditions d'utilisation</a> et la 
                        <a href="#">politique de confidentialité</a>
                    </label>
                </div>

                {{-- Main submit button --}}
                <button type="submit" class="register-submit-btn">
                    CRÉER MON COMPTE
                </button>
            </form>

            {{-- Link to login page for existing users --}}
            <p class="login-text">
                Déjà membre ? <a href="{{ route('login') }}">Se connecter</a>
            </p>

            {{-- Bottom reassurance text --}}
            <div class="register-note">
                Email de vérification envoyé ·
            </div>

        </div>
    </div>
</section>

@endsection