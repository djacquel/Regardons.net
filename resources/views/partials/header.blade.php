<nav class="navbar">
    <div class="nav-container">

        {{--
            Logo section.
            route('homepage') generates the URL for your home page.
            So when the logo is clicked, the user goes back to the homepage.
        --}}
        <a href="{{ route('homepage') }}" class="logo-wrapper">
            {{--
                asset('images/logo.png') builds the correct URL
                to the image inside your public/images folder.
                Example: public/images/logo.png
            --}}
            <img src="{{ asset('images/logo.png') }}" alt="Logo Regardons" class="logo">
        </a>

        {{--
            MOBILE BURGER BUTTON.
            This button is hidden on desktop and shown on mobile.
            JavaScript will toggle the mobile menu open and closed.
        --}}
        <button class="burger-btn" aria-label="Toggle menu" aria-expanded="false" type="button">
            {{--
                These three spans create the burger icon lines.
                They can also animate into an X when the menu opens.
            --}}
            <span></span>
            <span></span>
            <span></span>
        </button>

        {{--
            This wrapper contains everything that should become
            the mobile dropdown menu on smaller screens.
            On desktop it stays in the normal horizontal layout.
        --}}
        <div class="menu-panel">

            {{--
                Navigation links shown in the center of the header.
                Each <li> is one menu item.
                Each route(...) points to a named Laravel route from web.php.
            --}}
            <ul class="navlinks">
                {{--
                    "active" is used to style the current page differently.
                    Here, Accueil is marked as active.
                --}}
                <li><a href="{{ route('homepage') }}" class="navlink active">Accueil</a></li>

                {{-- Link to the blog page --}}
                <li><a href="{{ route('blogpage') }}" class="navlink">Blog</a></li>

                {{-- Link to the gallery page --}}
                <li><a href="{{ route('gallerypage') }}" class="navlink">Galerie</a></li>

                {{-- Link to the about page --}}
                <li><a href="{{ route('aboutpage') }}" class="navlink">À propos</a></li>

                {{-- Link to the contact page --}}
                <li><a href="{{ route('contactpage') }}" class="navlink">Contact</a></li>
            </ul>

            {{--
                Right side of the header.
                This groups together:
                - the search bar
                - authentication links (login/register or dashboard/logout)
            --}}
            <div class="right-section">

                {{--
                    Search bar block.
                    The icon is loaded from public/images/search.png.
                    The input lets the user type a search keyword.
                    Right now this is only the visual part.
                    It will only "work" when connected to a real search feature.
                --}}
                <div class="search_bar">
                    <img src="{{ asset('images/search.png') }}" alt="Rechercher" class="search_icon">
                    <input type="search" placeholder="Rechercher..." />
                </div>

                {{--
                    Authentication links.
                    @auth checks if the user is logged in.
                    If the user is connected, Laravel shows dashboard + logout.
                    If the user is not connected, Laravel shows login + register.
                --}}
                <ul class="auth-links">
                    @auth
                        {{--
                            This link is only shown to authenticated users.
                            It sends them to their dashboard page.
                        --}}
                        <li><a href="{{ route('dashboardpage') }}" class="btn btn-ghost">Dashboard</a></li>

                        <li>
                            {{--
                                Logout must be done with a POST request for security.
                                That is why we use a form instead of a simple <a> link.
                                route('logout') is the Fortify logout route.
                            --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-out">Logout</button>
                            </form>
                        </li>
                    @else
                        <li>
                            {{--
                                If the user is NOT logged in,
                                show the login link.
                                route('login') is provided by Fortify.
                            --}}
                            <a href="{{ route('login') }}" class="btn btn-ghost">Connexion</a>
                        </li>

                        <li>
                            {{--
                                If the user is NOT logged in,
                                show the register link.
                                route('register') is also provided by Fortify.
                            --}}
                            <a href="{{ route('register') }}" class="btn btn-primary">INSCRIPTION</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

    {{--
        MENU OVERLAY.
        This dark background appears behind the mobile menu.
        Clicking it can close the menu.
    --}}
    <div class="menu-overlay"></div>
</nav>