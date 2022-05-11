   <!-- Header -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available header.navbar classes:

        'navbar-default'            for the default light header
        'navbar-inverse'            for an alternative dark header

        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in back-office/assets/js/app.js - handleSidebar())
            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in back-office/assets/js/app.js - handleSidebar()))
            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
    -->
    <header class="navbar navbar-default">
      <!-- Left Header Navigation -->
      <ul class="nav navbar-nav-custom">
          <!-- Main Sidebar Toggle Button -->
          {{-- <li>
              <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                  <i class="fa fa-bars fa-fw"></i>
              </a>
          </li> --}}
          <!-- END Main Sidebar Toggle Button -->

          <!-- Template Options -->
          <!-- Change Options functionality can be found in back-office/assets/js/app.js - templateOptions() -->
          <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="gi gi-settings"></i>
              </a>
              <ul class="dropdown-menu dropdown-custom dropdown-options">
                  <li class="dropdown-header text-center">Header Style</li>
                  <li>
                      <div class="btn-group btn-group-justified btn-group-sm">
                          <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                          <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                      </div>
                  </li>
                  <li class="dropdown-header text-center">Page Style</li>
                  <li>
                      <div class="btn-group btn-group-justified btn-group-sm">
                          <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                          <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                      </div>
                  </li>
              </ul>
          </li>
          <!-- END Template Options -->
      </ul>
      <!-- END Left Header Navigation -->

      <!-- Search Form -->
      {{-- <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
          <div class="form-group">
              <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
          </div>
      </form> --}}
      <!-- END Search Form -->

      <!-- Right Header Navigation -->
      <ul class="nav navbar-nav-custom pull-right">
          <!-- Alternative Sidebar Toggle Button -->
          <li>
              <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
              {{-- <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');this.blur();">
                  <i class="gi gi-share_alt"></i>
                  <span class="label label-primary label-indicator animation-floating">4</span>
              </a> --}}
          </li>
          <!-- END Alternative Sidebar Toggle Button -->

          <!-- User Dropdown -->
          <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('back-office/assets/img/placeholders/avatars/avatar2.jpg') }}" alt="avatar"> <i class="fa fa-angle-down"></i>
              </a>
              <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                  <li class="dropdown-header text-center">Compte</li>
                  
                  <li class="divider"></li>
                  <li>
                      <a href="page_ready_user_profile.html">
                          <i class="fa fa-user fa-fw pull-right"></i>
                          Votre Profile
                      </a>
                      <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                      {{-- <a href="#modal-user-settings" data-toggle="modal">
                          <i class="fa fa-cog fa-fw pull-right"></i>
                          Settings
                      </a> --}}
                  </li>
                  <li class="divider"></li>
                   
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf 
                      <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    this.closest('form').submit();"
                      ><i class="fa fa-lock fa-fw pull-right"></i> Déconnecter</a>
                     </form>
                     
{{--                      
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf --}}
    
                        {{-- <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Déconnecter') }}
                        </x-responsive-nav-link> --}}
                        {{-- <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();"><i class="fa fa-ban fa-fw pull-right"></i> Déconnecter</a>
                 --}}
                {{-- <a href= data-toggle="tooltip" data-placement="bottom" title="Deconnecter"><i class="gi gi-exit"></i></a> --}}
              {{-- </form> --}}
                     
                     
                     
                      
                  </li>
                  
              </ul>
          </li>
          <!-- END User Dropdown -->
      </ul>
      <!-- END Right Header Navigation -->
  </header>
  <!-- END Header -->