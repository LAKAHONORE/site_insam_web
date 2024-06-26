<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="m-0" style="font-family: Montserrat"><img src="{{ URL::asset('public/site/img/logo-insam.png') }}"  alt="Image"> IUEs/Insam</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ route('accueil') }}" class="nav-item nav-link active">Accueil</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">A propos</a>
            <a href="{{ route('actualite') }}" class="nav-item nav-link">Actualités</a>
            <a href="{{ route('pre_registration') }}" class="nav-item nav-link">Pré-inscription</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Nos Filières</a>
                <div class="dropdown-menu m-0">
                    <a href="destination.html" class="dropdown-item">Destination</a>
                    <a href="tour.html" class="dropdown-item">Explore Tour</a>
                    <a href="booking.html" class="dropdown-item">Travel Booking</a>
                    <a href="gallery.html" class="dropdown-item">Our Gallery</a>
                    <a href="guides.html" class="dropdown-item">Travel Guides</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>
        <a href="{{ route('connexion') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Connexion</a>
    </div>
</nav>