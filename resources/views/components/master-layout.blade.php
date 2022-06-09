<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>{{ config('app.name', 'ANPTIC') }}</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('back-office/assets/img/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('back-office/assets/img/icon57.png') }}" sizes="57x57">
        <link rel="apple-touch-icon" href="{{ asset('back-office/assets/img/icon72.png') }}" sizes="72x72">
        <link rel="apple-touch-icon" href="{{ asset('back-office/assets/img/icon76.png') }}" sizes="76x76">
        <link rel="apple-touch-icon" href="{{ asset('back-office/assets/img/icon114.png') }}" sizes="114x114">
        <link rel="apple-touch-icon" href="{{ asset('back-office/assets/img/icon120.png') }}" sizes="120x120">
        <link rel="apple-touch-icon" href="{{ asset('back-office/assets/img/icon144.png') }}" sizes="144x144">
        <link rel="apple-touch-icon" href="{{ asset('back-office/assets/img/icon152.png') }}" sizes="152x152">
        <link rel="apple-touch-icon" href="{{ asset('back-office/assets/img/icon180.png') }}" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ asset('back-office/assets/css/bootstrap.min.css') }}">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{ asset('back-office/assets/css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ asset('back-office/assets/css/main.css') }}">

        <!-- Include a specific file here from back-office/assets/css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ asset('back-office/assets/css/themes.css') }}">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="{{ asset('back-office/assets/js/vendor/modernizr.min.js') }}"></script>



    </head>
    <body>

      <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
          <!-- Preloader -->
          <!-- Preloader functionality (initialized in back-office/assets/js/app.js') }}) - pageLoading() -->
          <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
          <div class="preloader themed-background">
              <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
              <div class="inner">
                  <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                  <div class="preloader-spinner hidden-lt-ie10"></div>
              </div>
          </div>
          <!-- END Preloader -->

          <!-- Page Container -->
          <!-- In the PHP version you can set the following options from inc/config file -->
          <!--
              Available #page-container classes:

              '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

              'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
              'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
              'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
              'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
              'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

              'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
              'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
              'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

              'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

              'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

              'style-alt'                                     for an alternative main style (without it: the default style)
              'footer-fixed'                                  for a fixed footer (without it: a static footer)

              'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

              'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
              'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

              'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
          -->
          <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

            <!-- Alternative Sidebar -->
              <div id="sidebar-alt">
                  <!-- Wrapper for scrolling functionality -->
                  <div id="sidebar-alt-scroll">
                      <!-- Sidebar Content -->
                      <div class="sidebar-content">
                                           <!-- chat -->
                          <!-- Activity (icon gestion/compte)-->

                          <!-- END Activity -->

                          <!-- Messages -->

                          <!-- END Messages -->
                      </div>
                      <!-- END Sidebar Content -->
                  </div>
                  <!-- END Wrapper for scrolling functionality -->
              </div>
              <!-- END Alternative Sidebar -->

              @include('back-office/partials.nav')


                          <main>
                            {{ $slot }}
                        </main>
          </div>
          <!-- END Page Container -->
      </div>
      <!-- END Page Wrapper -->





       <!-- Scroll to top link, initialized in back-office/assets/js/app.js') }} - scrollToTop() -->
       <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
       <!-- start popup manage setting user and ActivityUI  -->
        @include('back-office/partials.modal-user-settings')
        <!-- END  -->


   <!-- jQuery, Bootstrap.js') }}, jQuery plugins and Custom JS code -->
   <script src="{{ asset('back-office/assets/js/vendor/jquery.min.js') }}"></script>
   <script src="{{ asset('back-office/assets/js/vendor/bootstrap.min.js') }}"></script>
   <script src="{{ asset('back-office/assets/js/plugins.js') }}"></script>
   <script src="{{ asset('back-office/assets/js/app.js') }}"></script>


   <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
   <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->

   <script src="{{ asset('back-office/assets/js/helpers/gmaps.min.js') }}"></script>


   <script src="{{ asset('back-office/assets/js/pages/tablesDatatables.js') }}"></script>
   <script>$(function(){ TablesDatatables.init(); });</script>


   <!-- Load and execute javascript code used only in this page -->
   <script src="{{ asset('back-office/assets/js/pages/index.js') }}"></script>
   <script>$(function(){ Index.init(); });</script>

    </body>
</html>
