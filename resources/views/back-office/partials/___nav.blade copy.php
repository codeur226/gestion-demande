<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="{{ route('admin')}}" class="sidebar-brand">
                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>GESTION </strong> SE</span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="page_ready_user_profile.html">
                        <img src="{{asset('back-office/assets/img/placeholders/avatars/avatar2.jpg')}}" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name"> {{ Auth::user()->prenom }} {{Auth::user()->nom}}</div>
               
                
                <div class="sidebar-user-links">
                    <a href="page_ready_user_profile.html" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                    <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                    
                    
               
                    {{-- <div class="mt-3 space-y-1"> --}}
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Déconnecter') }}
                            </x-responsive-nav-link>
                      
                    
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                this.closest('form').submit();" data-toggle="tooltip" data-placement="bottom" title="Deconnecter"><i class="gi gi-exit"></i></a>
                  </form>
                    {{-- </div>  --}}
                </div> 


            </div>
            <!-- END User Info -->

          

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="{{ route('admin')}}" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Acceuil</span></a>
                </li>
                
                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-cogwheel sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Paramétrage</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('parametres.index')}}">Paramètre</a>
                        </li>
                        <li>
                            <a href="{{ route('valeurs.index')}}">Valeur</a>
                        </li>
                        <li>
                            <a href="{{ route('themes.index')}}">Thèmes des stages</a>
                        </li>
                       
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gestion demandes</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('demandes.index')}}">Demandes de stages</a>
                        </li>
                        <li>
                            <a href="">Demandes d'emplois</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-briefcase sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gestion des stages</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('stageencours')}}">Stages</a>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-briefcase sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gestion des emplois</span></a>
                    <ul>
                        <li>
                            <a href="#">Emplois</a>
                        </li>
                    </ul>
                </li>
                

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gestion utilisateurs</span></a>
                    <ul>
                        <li>
                            <a href="">Liste des utilisateurs</a>
                        </li>
                    </ul>
                </li>
            
             
            </ul>
            <!-- END Sidebar Navigation -->

            <!-- Sidebar Notifications -->
            
            <!-- END Sidebar Notifications -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->