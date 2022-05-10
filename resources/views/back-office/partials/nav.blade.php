<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="{{ route('admin')}}" class="sidebar-brand">
                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>STAGES </strong> EMPLOIS</span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="page_ready_user_profile.html">
                        <img src="{{ asset('back-office/assets/img/placeholders/avatars/avatar2.jpg" alt="avatar') }}">
                    </a>
                </div>
                <div class="sidebar-user-name"> <i class="text-center"> <strong>{{ Auth::user()->prenom." ".Auth::user()->nom}}</strong> </i></div>


            </div>
            <!-- END User Info -->



            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="{{ route('admin')}}" class=""><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tableau de bord</span></a>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-cogwheel sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Paramétrage</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('parametres.index')}}">Paramètres</a>
                        </li>
                        <li>
                            <a href="{{ route('valeurs.index')}}">Valeurs</a>
                        </li>
                        <li>
                            <a href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        <li>
                            <a href="{{ route('permissions.index') }}">Permissions</a>
                        </li>

                        <li>
                            <a href="{{ route('themes.index')}}">Thèmes des stages</a>
                        </li>

                        <li>
                            <a href="{{ route('directions.index')}}">Directions</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-envelope sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gestion demandes</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('demandes.index')}}">Demandes de stages</a>
                        </li>
                        {{-- <li>
                            <a href="">Demandes d'emplois</a>
                        </li> --}}
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-briefcase sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gestion des stages</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('stagevalides')}}">Stages validés</a>
                        </li>
                        <li>
                            <a href="{{ route('stageencours')}}">Stages en cours</a>
                        </li>
                        <li>
                            <a href="{{ route('stagetermines')}}">Stages terminés</a>
                        </li>
                    </ul>
                </li>



                {{-- <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-briefcase sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gestion des emplois</span></a>
                    <ul>
                        <li>
                            <a href="#">Emplois</a>
                        </li>
                    </ul>
                </li> --}}


                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Gestion utilisateurs</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('listeUser')}}">Liste des utilisateurs</a>
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
