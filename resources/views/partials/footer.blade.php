{{-- 
|--------------------------------------------------------------------------
| Footer Section
|--------------------------------------------------------------------------
| This is the main footer for your website "Regardons"
| It contains:
| - Logo & tagline
| - Navigation links
| - Copyright
|--------------------------------------------------------------------------
--}}

<footer class="footer">
    <div class="footer-container">

        {{-- LEFT SIDE: Logo + Tagline --}}
        <div class="footer-left">
            {{-- Logo image --}}
            <h2 class="footer-logo"> REGARD<span class="ons">ONS</span></h2>

            {{-- Tagline --}}
            <p class="footer-tagline">La nature vue à travers l'objectif</p>
        </div>


        {{-- RIGHT SIDE: Navigation Columns --}}
        <div class="footer-right">

            {{-- Column 1: Explorer --}}
            <div class="footer-column">
                <h3>Explorer</h3>
                <ul>
                    <li><a href="{{route('blogpage')}}">Blog</a></li>
                    <li><a href="{{route('gallerypage')}}">Galerie</a></li>
                    <li><a href="#">Sites naturels</a></li>
                </ul>
            </div>

            {{-- Column 2: Communauté --}}
            <div class="footer-column">
                <h3>Communauté</h3>
                <ul>
                    <li><a href="{{route('register')}}">Inscription</a></li>
                    <li><a href="{{route('login')}}">Connexion</a></li>
                    <li><a href="#">Profil</a></li>
                </ul>
            </div>

            {{-- Column 3: À propos --}}
            <div class="footer-column">
                <h3>À propos</h3>
                <ul>
                    <li><a href="{{route('aboutpage')}}">L'équipe</a></li>
                    <li><a href="{{route('contactpage')}}">Contact</a></li>
                    <li><a href="#">Mentions légales</a></li>
                </ul>
            </div>

        </div>
    </div>


    {{-- Bottom bar --}}
    <div class="footer-bottom">
        <p>© {{ date('Y') }} Regardons · Tous droits réservés · Photographie de nature · France</p>
    </div>
</footer>