@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')


<section class="home-page">

    {{-- 
        HERO SECTION
        This top area is split into two columns:
        - left side = text content
        - right side = large visual placeholder
    --}}
    <section class="hero-section">
        <div class="hero-text-side">

            {{-- Small label above the main title --}}
            <p class="hero-eyebrow">• Photographie de nature</p>

            {{-- Main homepage title --}}
            <h1 class="hero-title">
                La nature vue à <br>
                travers <span>l'objectif</span>
            </h1>

            {{-- Short intro text under the title --}}
            <p class="hero-description">
                Conseils techniques, sites naturels d'exception, portraits de faune 
                et de flore. Une communauté de passionnés qui partagent leur regard 
                sur le vivant.
            </p>

            {{-- Action buttons --}}
            <div class="hero-actions">
                <a href="{{route('blogpage')}}" class="primary-btn">Explorer le blog</a>
                <a href="{{route('gallerypage')}}" class="secondary-btn">Voir la galerie</a>
            </div>

            {{-- Statistics line --}}
            <div class="hero-stats">
                <div class="stat-item">
                    <h3>3</h3>
                    <span>Articles</span>
                </div>

                <div class="stat-item">
                    <h3>2</h3>
                    <span>Membres</span>
                </div>

                <div class="stat-item">
                    <h3>0</h3>
                    <span>Photos</span>
                </div>
            </div>
        </div>

        {{-- 
            Hero visual side
            Replace this block with an image later if you want.
        --}}
        <div class="hero-visual-side">
            <img src="{{asset ('images/hero_image.jpg')}}" alt="Image principale" class="hero-image">
        </div>
    </section>

    {{-- 
        SEARCH + FILTER BAR
        This section contains a search input, a button, and filter tags.
    --}}
    <section class="search-filter-bar">
        <div class="search-box">
            <input type="text" placeholder="Rechercher un article, un lieu, une technique photographique..." />
            <button type="button">Rechercher</button>
        </div>

        <div class="filter-tags">
            <button class="tag active">Tous</button>
            <button class="tag">Technique</button>
            <button class="tag">Sites naturels</button>
            <button class="tag">Portraits</button>
        </div>
    </section>

    {{-- 
        FEATURED SECTION
        This area shows one large featured article on the left
        and smaller article cards on the right.
    --}}
    <section class="featured-section">
        <div class="section-heading">
            <span>• À la une</span>
        </div>

        <div class="featured-grid">

            {{-- Large featured article card --}}
            <div class="featured-main-card">
                <img src="{{asset('images/big_image.jpg')}}" alt="Grande image à remplacer" class="featured-main-image">

                <div class="card-content">
                    <p class="card-category">Technique photo</p>
                    <h2>Maîtriser la lumière rasante au crépuscule en forêt dense</h2>
                    <p class="card-meta">Marie Castañon · 12 mars 2026 · 8 min de lecture</p>
                </div>
            </div>

            {{-- Smaller cards on the right --}}
            <div class="featured-side-cards">

                <div class="small-card">
                    <img src="{{asset('images/small_image1.jpg')}}" alt="Image" class="small-card-image">
                    <div class="card-content">
                        <p class="card-category">Sites naturels</p>
                        <h3>Marais de la Brière — paradis ornithologique</h3>
                        <p class="card-meta">Pierre L. · 8 mars</p>
                    </div>
                </div>

                <div class="small-card">
                    <img src="{{asset('images/small_image2.jpg')}}" alt="Image" class="small-card-image">
                    <div class="card-content">
                        <p class="card-category">Technique photo</p>
                        <h3>Aurores boréales : guide de préparation complète</h3>
                        <p class="card-meta">Marc R. · 25 fév.</p>
                    </div>
                </div>

                <div class="small-card">
                    <img src="{{asset('images/small_image3.jpg')}}" alt="Image" class="small-card-image">
                    <div class="card-content">
                        <p class="card-category">Portraits</p>
                        <h3>Photographier le cerf en période de rut</h3>
                        <p class="card-meta">Sophie B. · 3 mars</p>
                    </div>
                </div>

                <div class="small-card">
                    <img src="{{asset('images/small_image4.jpg')}}" alt="Image" class="small-card-image">
                    <div class="card-content">
                        <p class="card-category">Sites naturels</p>
                        <h3>Landes de Gascogne à l'heure dorée</h3>
                        <p class="card-meta">Alice B. · 18 fév.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 
        LATEST ARTICLES SECTION
        This section contains three large cards in one row on desktop.
    --}}
    <section class="latest-articles-section">
        <div class="latest-header">
            <h2>Derniers articles</h2>
            <a href="{{route('blogpage')}}" class="view-all-link">Voir tous les articles →</a>
        </div>

        <div class="latest-grid">

            <div class="latest-card">
                <img src="{{asset('images/articla_image1.jpg')}}" alt="Image" class="latest-card-image">
                <div class="card-content">
                    <p class="card-category">Technique photo</p>
                    <h3>Comprendre l'histogramme pour une exposition parfaite</h3>
                    <p class="card-text">
                        L'outil le plus précis pour évaluer votre exposition en conditions difficiles.
                    </p>
                    <div class="card-footer-meta">
                        <span>Jean L. · 15 mars</span>
                        <span>♡ 34</span>
                    </div>
                </div>
            </div>

            <div class="latest-card">
                <img src="{{asset('images/articla_image2.jpg')}}" alt="Image" class="latest-card-image">
                <div class="card-content">
                    <p class="card-category">Sites naturels</p>
                    <h3>Les étangs de Sologne à l'heure bleue</h3>
                    <p class="card-text">
                        Territoire mythique pour la photographie d'oiseaux migrateurs au lever du jour.
                    </p>
                    <div class="card-footer-meta">
                        <span>Paul D. · 11 mars</span>
                        <span>♡ 58</span>
                    </div>
                </div>
            </div>

            <div class="latest-card">
                <img src="{{asset('images/articla_image3.jpg')}}" alt="Image" class="latest-card-image">
                <div class="card-content">
                    <p class="card-category">Portraits</p>
                    <h3>Biche et faon : la patience comme technique</h3>
                    <p class="card-text">
                        Approche lente, vent favorable et lecture du terrain — la triade essentielle.
                    </p>
                    <div class="card-footer-meta">
                        <span>Sophie B. · 3 mars</span>
                        <span>♡ 72</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

</section>
@endsection