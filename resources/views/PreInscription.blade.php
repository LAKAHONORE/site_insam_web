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
                <h3 class="text-white display-3 mb-4 animate__animated animate__bounce"> <span class="animate__animated animate__flip">Pré-Inscription</span></h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('accueil') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Pré-Inscription</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->



        
        @include('Component.PreInscription')




        @include('Component.Partials.Footer')


        @include('Component.Partials.Foot')
    </body>

</html>