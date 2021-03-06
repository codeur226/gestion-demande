<x-master-layout title=" | Acceuil">
   <!-- Main Container -->
   <div id="main-container">
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
            <li>
                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                    <i class="fa fa-bars fa-fw"></i>
                </a>
            </li>
            <!-- END Main Sidebar Toggle Button -->

            <!-- Template Options -->
            <!-- Change Options functionality can be found in back-office/assets/js/app.js - templateOptions() -->
            {{--<li class="dropdown">
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
            </li>--}}
            <!-- END Template Options -->
        </ul>
        <!-- END Left Header Navigation -->

        <!-- Search Form -->
        {{--<form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
            <div class="form-group">
                <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
            </div>
        </form>--}}
        <!-- END Search Form -->

        <!-- Right Header Navigation -->
        <ul class="nav navbar-nav-custom pull-right">
            <!-- Alternative Sidebar Toggle Button -->
            {{--<li>
                <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');this.blur();">
                    <i class="gi gi-share_alt"></i>
                    <span class="label label-primary label-indicator animation-floating">4</span>
                </a>
            </li>--}}
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
                    ><i class="fa fa-lock fa-fw pull-right"></i> D??connecter</a>
                   </form>
                   
{{--                      
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf --}}
  
                      {{-- <x-responsive-nav-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('D??connecter') }}
                      </x-responsive-nav-link> --}}
                      {{-- <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();"><i class="fa fa-ban fa-fw pull-right"></i> D??connecter</a>
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

    <!-- Page content -->
    <div id="page-content">
        {{-- @include('back-office/partials.header') --}}

        <div class="row">
            @if(session()->has('message'))
            <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('message') }}
                
            </div>

             <script>
                $(".alert").alert();
                $(document).ready(function () {
                    
                    window.setTimeout(function() {
                        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                            $(this).remove(); 
                        });
                    }, 5000);
                    
                    });
              </script>
            @endif
          
        </div>

        <style>
            .txt-color-default{
                color: #1bbae1;
            }

            .txt-color-autumn{
                color: #e67e22;
            }

            .txt-color-spring{
                color: #27ae60;
            }

            .txt-color-fire{
                color: #e74c3c;
            }
        </style>

        <!-- Mini Top Stats Row -->
        <div class="row">
            @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3 || Auth::user()->role_id == 7)
            <div class="col-sm-6 col-lg-3">
                <!-- Widget -->
                <a href="{{ route('demandes.index')}}" class="widget widget-hover-effect1">
                    <div class="widget-simple">
                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                            <i >{{ $stageattente }}</i>
                            {{-- class="fa fa-file-text" --}}

                        </div>

                        <h3 class="widget-content text-right animation-pullDown txt-color-autumn">
                            Total des <strong>Demandes</strong><br>
                            <small>de stage</small>
                        </h3>

                    </div>

                </a>
                <!-- END Widget -->
            </div>
            @endif

            <div class="col-sm-6 col-lg-3">
                <!-- Widget -->
                <a href="{{ route('stagevalides')}}" class="widget widget-hover-effect1">
                    <div class="widget-simple">
                        <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                            <i >{{ $stagevalide }}</i>
                            {{-- class="gi gi-usd" --}}
                        </div>
                        <h3 class="widget-content text-right animation-pullDown txt-color-spring">
                            Total des <br> <strong>Stages</strong><br>
                            <small>valid??s</small>
                        </h3>
                    </div>
                </a>
                <!-- END Widget -->
            </div>
            <div class="col-sm-6 col-lg-3">
                <!-- Widget -->
                <a href="{{ route('stageencours')}}" class="widget widget-hover-effect1">
                    <div class="widget-simple">
                        <div class="widget-icon pull-left themed-background-default animation-fadeIn">
                            <i >{{ $stageencours }}</i>
                            {{-- class="gi gi-envelope" --}}
                        </div>
                        <h3 class="widget-content text-right animation-pullDown txt-color-default">
                            Total des <br> <strong>Stages</strong>
                            <small>en cours</small>
                        </h3>
                    </div>
                </a>
                <!-- END Widget -->
            </div>
            <div class="col-sm-6 col-lg-3">
                <!-- Widget -->
                <a href="{{ route('stagetermines')}}" class="widget widget-hover-effect1">
                    <div class="widget-simple">
                        <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                            <i > {{ $stagetermines }} </i>
                            {{-- class="gi gi-picture" --}}
                        </div>
                        <h3 class="widget-content text-right animation-pullDown txt-color-fire">
                           Total des<strong> <br> Stages</strong>
                            <small>termin??s</small>
                        </h3>
                    </div>
                </a>
                <!-- END Widget -->
            </div>


        </div>

        <script>
            // DATA FROM PHP TO JAVASCRIPT
            const labels = {!! json_encode($labels) !!};
            const data = {!! json_encode($data) !!};
        </script>
        
        <table>
            <tr>
                <td><canvas id="myChart1" width="500" height="350"></canvas></td>
                <td><canvas id="myChart2" width="500" height="350"></canvas></td>
            </tr>
        </table>

        
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        
        <script>
            const ctx1 = document.getElementById('myChart1').getContext('2d');
            const ctx2 = document.getElementById('myChart2').getContext('2d');
            const myChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: labels, // <======= axe horizontal x
                    datasets: [{
                        label: 'Demandes de stage',
                        barThickness: 15,
                        data: data, // <======= axe vertical y
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(54, 162, 235)',
                            'rgba(255, 206, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(153, 102, 255)',
                            'rgba(255, 159, 64)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            type: 'linear',
                            min: 0,
                            max: {{ $maxi }},
                            beginAtZero: true
                        }
                    }
                }
            });

            const myChart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: labels, // <======= axe horizontal x
                    datasets: [{
                        label: 'Demandes de stage',
                        data: data, // <======= axe vertical y
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            type: 'linear',
                            min: 0,
                            max: {{ $maxi }},
                            beginAtZero: true,
                        }
                    }
                }
            });
        </script>

        @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3 || Auth::user()->role_id == 7)
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Pr??nom (s)</th>
                        <th>Domaine</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Etat</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr >

                        <?php $number=0; ?>

                    @foreach ($demandes as $demande)
                    <?php $number++; ?>
                        <td class="text-center"> {{$number}}</td>
                        <td>{{$demande->code}}</td>
                        <td>{{$demande->nom}}</td>
                        <td>{{$demande->prenom}}</td>
                        <td>{{getDirection($demande->direction_id)}}</td>
                        <td>{{$demande->date_debut}}</td>
                        <td>{{$demande->date_fin}}</td>
                        <td>{{getValeur($demande->etat)}}</td>
                         <td class="text-center">
                            <div class="btn-group">

                                <a title="Voir les d??tails" href="{{ route('demandes.show', $demande->id) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                {{-- <a href="{{ route('demandes.edit', $demande) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a> --}}
                                <a title="Supprimer la demande" href="{{ route("demandes.destroy", $demande->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                    event.preventDefault();
                                    if(confirm('Etes-vous sur de vouloir supprimer cette demande ?'))
                                    document.getElementById('{{ $demande->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                <form id="{{ $demande->id }}" method="post" action="{{ route("demandes.destroy", $demande->id) }}">
                                    @csrf
                                    @method("delete")
                                </form>

                                {{--<a href="#" class="btn btn-danger btn-sm"  onClick=" event.preventDefault();suppressionConfirm('{{ $param->id }}')" ><i class="fa fa-trash-o fa-lg"></i></a>--}}
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>
    <!-- END Page Content -->

    @include('back-office/partials.footer')
</div>
<!-- END Main Container -->


</x-master-layout>
