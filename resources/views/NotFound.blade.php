<!DOCTYPE html>
<html lang="en">

    @include('Component.Partials.Head')

    <body>

        @include('Component.Partials.TopBar')


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            @include('Component.Partials.NavBar')
        </div>
        <!-- Navbar & Hero End -->


        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb animate__animated animate__fadeIn">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4 animate__animated animate__bounce"> <span class="animate__animated animate__flip">Not Found</span></h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('accueil') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-white">404</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->



        
        <!-- 404 Start -->
        <div class="container-fluid py-5" style="background: linear-gradient(rgba(19, 53, 123, 0.3), rgba(19, 53, 153, 0.3)); object-fit: cover;">
            <div class="container py-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                        <h1 class="display-1">404</h1>
                        <h1 class="mb-4 text-dark">Page Not Found</h1>
                        <p class="mb-4 text-dark">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('accueil') }}">Go Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 404 End -->




        @include('Component.Partials.Footer')


        @include('Component.Partials.Foot')
    </body>

</html>