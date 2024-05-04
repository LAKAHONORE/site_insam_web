<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Plus Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo_1/style.css') }}" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/chosen/chosen.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/chosen/prism.css') }}" />
    <script src="{{ asset('dashboard/assets/js/jquery.js') }}"></script>
    <script defer src="{{ asset('dashboard/assets/js/chosen/chosen.jquery.js') }}"></script>
    <script defer src="{{ asset('dashboard/assets/js/chosen/prism.js') }}"></script>
    <script defer src="{{ asset('dashboard/assets/js/chosen/init.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/alert.js') }}"></script>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="{{ asset('dashboard/assets/images/profil.png') }}" alt="profile" />
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                <span class="font-weight-semibold mb-1 mt-2 text-center">Nom de l'utilisateur</span>
              </div>
            </a>
          </li>

 
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Tableau de bord</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Site</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                </li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ecoles.index') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Ecoles</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('cycles.index') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Cycles</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('filieres.index') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Filières</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('specialites.index') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Spécialitées</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('modules.index') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Modules</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('notes.index') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Ajout / Modification des notes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('notes.filtreReleve') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Réléve de notes</span>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">Configuration du menu gauche</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Par défaut
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Sombre
          </div>
          <p class="settings-heading mt-2">Configuration de l'en-tête</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('dashboard/assets/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>

            <ul class="navbar-nav navbar-nav-right">
            
              <li class="nav-item nav-logout d-none d-md-block">
                <button class="btn btn-sm btn-danger">Trailing</button>
              </li>
              <!--
              <li class="nav-item nav-profile dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <div class="nav-profile-text">English </div>
                </a>
                <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-bl mr-3"></i> French </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-cn mr-3"></i> Chinese </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-de mr-3"></i> German </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="flag-icon flag-icon-ru mr-3"></i>Russian </a>
                </div>
              </li>
            -->
            
              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-home-circle"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper pb-0">


            @yield('content')


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Future Web Development 2024</span>
            </div>
          </footer>
          <!-- partial -->
        </div>


        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    @if (Session::has('message'))
        <script>
            swal({
                title: 'Message',
                text: "{{ session('message') }}",
                icon: "{{ session('type') }}",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: false,
                        className: "",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Ok",
                        value: null,
                        visible: true,
                        className: "bt new align-center",
                        closeModal: true
                    }
                },
                // content: {
                //     element: "input",
                //     attributes: {
                //         placeholder: "Type your password",
                //         type: "password",
                //     }
                // },
                // closeOnClickOutside: false,
                // closeOnEsc: false,
                timer: 10000,
            })
        </script>
    @endif

    <script src="{{ asset('dashboard/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('dashboard/assets/vendors/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/misc.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/settings.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/dashboard.js') }}"></script>
  </body>
</html>