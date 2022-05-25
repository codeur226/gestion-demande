<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <title>Demande de stage</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <link rel="shortcut icon" href="{{ asset('front-office/assets/img/favicon.png?v=3') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('front-office/assets/css/preload.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-office/assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-office/assets/css/style.light-blue-500.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    
    




    <!-- Stylesheets -->
  



    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('back-office/assets/css/main.css') }}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{ asset('back-office/assets/css/themes.css') }}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="{{ asset('back-office/assets/js/vendor/modernizr.min.js') }}"></script>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
</head>

<!--MENU-->


<body class="color_white">
@include('front-office/partials.nav')

{{--start body--}}
<div class="ms-site-container"  style="background-color:#fff;">
    
    <section class="mb-4">
        <div class="container">
            <div class="row">
                @if(session()->has('message'))
                <div class="alert alert-danger center">
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
            <div class="row">
                {{-- <div class="col-md-6 offset-md-2"> --}}
                    <div class="col-md-12">
                    <h1 class="text-center">DEMANDE DE STAGE</h1>
                    <div class="block">
                        <!-- Progress Bars Wizard Title -->
                        <div class="block-title">
                            <h2><strong>Inscrivez-vous en suivant les étapes</strong></h2>
                            <h2><strong style="color:red;">NB: les champs en rouge (*) sont obligatoire</strong></h2>
                        </div>

                   <!-- Wizard with Validation Content -->
                   <form id="progress-wizard" action=" {{route('demandesfront.store')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf
                    <!-- ETAPE 1 -->
                    <div id="advanced-first" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-sm-4 active">
                                    <span>1. Info. Perso.</span>
                                </div>
                                <div class="col-sm-4    ">
                                    <span>2. Demande</span>
                                </div>
                                <div class="col-sm-4" >
                                    <span>3. Recap</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->

                        <div id="non_resp">
                            <div class="row" id="row_nom_prenom">
    
                                <div class="w-100"></div>
                                <div class="col" id="col_nom">
                                    <div class="form-group">
                                            <label  for="nom">Nom (<span style="color:red;">*</span>)</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" id="nom" name="nom" class="form-control form-control2" >
                                                </div>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
                                        </div>
                                </div>
        
        
                                <div class="col">
                                    <div class="form-group">
                                            <label  for="example-prenom">Prénom(s) (<span style="color:red;">*</span>)</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" id="prenom" name="prenom" class="form-control form-control2" required></div>
                                                </div>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
                                </div>
                            </div>
    
                            <div class="row" id="row_tel_email">
                                <div class="col">
                                    <div class="form-group">
                                            <label  for="telephone">Téléphone (<span style="color:red;">*</span>)</label>
        
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" id="telephone" name="telephone" class="form-control form-control2"  placeholder="+226XXXXXXXX" required >
                                            {{-- <label  for="whatsapp">Contact whatsapp (optionnel) </label> --}}
                                                        
                                                        <input type="text" id="whatsapp" name="whatsapp" class="form-control form-control2 form-control3" placeholder="Numéro Whatsapp (optionnel)" >
        
                                                        
                                                    </div>
                                                </div>
        
                                                {{-- <div class="col-md-4">
                                                    <div class="input-group">
                                                        <input type="text" id="telephone" name="telephone" class="form-control form-control2" required>
                                                    </div>
                                                </div> --}}
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
        
                                            
                                </div>
        
                                <div class="col">
                                    <div class="form-group">
                                            <label  for="email">E-mail (<span style="color:red;">*</span>)</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" id="email" name="email" class="form-control form-control2" required></div>
                                                </div>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
                                </div>
                            </div>
        {{-- 
                            <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-telephone">Contact whatsapp (optionnel) </label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" id="whatsapp" name="whatsapp" class="form-control form-control2"></div>
                                                    </div>
                                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                                </div>
                                        </div>
        
                                        <div class="col">
                                        
                                        </div>
                                </div> --}}
        
                            <div class="row"> </div>
                        </div>
    
                        <!-- DEBUT Responsive DIV -->
                        <div id="resp">
                            <div class="row" id="row_nom">
        
                                <div class="w-100"></div>
                                <div class="col">
                                    <div class="form-group">
                                            <label  for="nom">Nom (<span style="color:red;">*</span>)</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" id="nomR" name="nom" class="form-control form-control2" >
                                                </div>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
        
                            <div class="row" id="row_prenom">
        
                                <div class="w-100"></div>
                                <div class="col">
                                    <div class="form-group">
                                            <label  for="nom">Prénom(s) (<span style="color:red;">*</span>)</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" id="prenomR" name="prenom" class="form-control form-control2" >
                                                </div>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
        
                            <div class="row" id="row_telephone">
        
                                <div class="w-100"></div>
                                <div class="col">
                                    <div class="form-group">
                                        <label  for="telephone">Téléphone (<span style="color:red;">*</span>)</label>
        
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" id="telephoneR" name="telephone" class="form-control form-control2"  placeholder="+226XXXXXXXX" required >
                                                    
                                                    <input type="text" id="whatsappR" name="whatsapp" class="form-control form-control2 form-control3" placeholder="Numéro Whatsapp (optionnel)" >
        
                                                    
                                                </div>
                                            </div>
        
                                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                        </div>
                                </div>
                            </div>
        
                            <div class="row" id="row_email">
        
                                <div class="w-100"></div>
                                <div class="col">
                                    <div class="form-group">
                                            <label  for="email">E-mail (<span style="color:red;">*</span>)</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" id="emailR" name="email" class="form-control form-control2" >
                                                </div>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                            <!-- FIN Responsive DIV-->
                        
                            <script type="text/javascript">
                                var div = document.getElementById('advanced-first');
                                    if(window.innerWidth > 800){
                                        div.appendChild(non_resp);
                                    }
                                    else{
                                        div.appendChild(resp);
                                    }
                                    </script>

                    </div>
                    <!-- FIN ETATE 1 -->

                    <!-- SEGOND ETAPE -->
                    <div id="advanced-second" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-sm-4 done">
                                    <span>1. Info. Perso.</span>
                                </div>
                                <div class="col-sm-4 active" >
                                    <span>2. Demande</span>
                                </div>
                                <div class="col-sm-4" >
                                    <span>3. Recap</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                      <div class="div_res1">
                    <div class="row">
                        <div class="w-100"></div>
                        
                        <div class="col" > 
                            <div class="form-group">
                            <label  for="typestage">Type de stage (<span style="color:red;">*</span>)</label>
                            <div class="col_res1">
                            <select class="form-control form-control2" name="typestage" id="typestage">
                                @foreach($typestages as $typestage)
                                
                                <option value="{{$typestage->id}}">{{$typestage->valeur}}</option>
                                    
                                @endforeach 
                             
                               </select>
                              {{-- <span class="help-block">Saisir le profil</span> --}}
                              @error('typestage')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="form-group">
                                    <label  for="datedebut">Date début (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="date" id="datedebut" name="datedebut" class="form-control form-control2" required></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>


                    </div>
                         
                    <div class="row">
                                <div class="col"> 
                                    <div class="form-group">
                                    <label  for="direction">Domaine (<span style="color:red;">*</span>)</label>
                                    <div class="col_res1">
                                    <select class="form-control form-control2" name="direction" id="direction">
                                        @foreach($directions as $direction)
                                        
                                        <option value="{{$direction->id}}">{{$direction->domaine}}</option>
                                            
                                        @endforeach 
                                    
                                    </select>
                                    {{-- <span class="help-block">Saisir le profil</span> --}}
                                    @error('direction')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    </div>
                                </div>
                                </div>


                        
                            <div class="col">
                                <div class="form-group">
                                        <label  for="datefin">Date fin (<span style="color:red;">*</span>)</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input type="date" id="datefin" name="datefin" class="form-control form-control2" required></div>
                                            </div>
                                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                        </div>
                            </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="#">
                                    <label  for="cv">Joindre votre CV (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="file" name="cv"  id="cv"class="form-control form-control2" accept=".pdf" required > 
                                            {{-- required title="Ce champs est obligatoire !!" --}}
                                           
                                        </div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                        <div >
                                            <label  for="lettrerecommandation">Joindre votre lettre de recommandation (optionnelle)</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="file" id="lettrerecommandation" name="lettrerecommandation" class="form-control form-control2" ></div>
                                                </div>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
                                    </div>
                        </div>

                        <div class="col">
                            <div class="#">
                                    <label  for="diplome">Joindre votre diplôme/attestation (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                       
                                        <div class="input-group">
                                            <input type="file" id="diplome" name="diplome" class="form-control form-control2" required >
                                            </div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                   
                                   
                                    </div>

                        </div>
                    </div>

                </div>

                <div class="div_res2">
                    <div class="row">
                        <div class="w-100"></div>
                        <div class="col" > 
                            <label for="typestage">Type de stage (<span style="color:red;">*</span>)</label>
                            <div class="col_res">
                            
                            <select class="form-control form-control2" name="typestageR" id="typestage">
                                @foreach($typestages as $typestage)
                                
                                <option value="{{$typestage->id}}">{{$typestage->valeur}}</option>
                                    
                                @endforeach 
                             
                               </select>
                              {{-- <span class="help-block">Saisir le profil</span> --}}
                              @error('typestage')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                            </div>
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                        </div>
                    </div>

                    <div class="row">
                                <div class="col"> 
                                    <label  for="direction">Domaine (<span style="color:red;">*</span>)</label>
                                    <div class="col_res">
                                    
                                    <select class="form-control form-control2" name="directionR" id="direction">
                                        @foreach($directions as $direction)
                                        
                                        <option value="{{$direction->id}}">{{$direction->domaine}}</option>
                                            
                                        @endforeach 
                                    
                                    </select>
                                    {{-- <span class="help-block">Saisir le profil</span> --}}
                                    @error('direction')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    </div>
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                    </div>

                    <div class="row"> 
                        <div class="col">
                            <div class="form-group">
                                    <label  for="datedebut">Date début (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="date" id="datedebutR" name="datedebutR" class="form-control form-control2" required></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col">
                            <div class="form-group">
                                    <label  for="datefin">Date fin (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="date" id="datefinR" name="datefinR" class="form-control form-control2" required></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="#">
                                    <label  for="cv">Joindre votre CV (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="file" name="cvR"  id="cv"class="form-control form-control2" accept=".pdf" required > 
                                            {{-- required title="Ce champs est obligatoire !!" --}}
                                        </div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="#">
                                    <label  for="diplome">Joindre votre diplôme/attestation (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                       
                                        <div class="input-group">
                                            <input type="file" id="diplome" name="diplomeR" class="form-control form-control2" required >
                                            </div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                                </div>
                            </div>

                <div class="row">
                    <div class="col">
                        <div class="#">
                        <label  for="lettrerecommandation">Joindre votre lettre de recommandation (optionnelle)</label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="file" id="lettrerecommandation" name="lettrerecommandationR" class="form-control form-control2" ></div>
                            </div>
                            <span class="input-group-addon"><i class="gi gi-user"></i></span>
                        </div>
                    </div>
                </div>

                </div>

                    {{-- <div class="row">
                         <div class="w-100"></div>
                            <div class="col">
                           
                        </div>
    
                     </div> --}}

                     <script type="text/javascript">
                        var div = document.getElementById('advanced-second');
                            if(window.innerWidth > 800){
                                div.appendChild(div_res1);
                            }
                            else{
                                div.appendChild(div_res2);
                            }
                            </script>

            </div>

            
                    
                    <!-- END Second Step -->
{{-- RECAPITULATIF DEBUT --}}
<!-- First Step -->
<div id="advanced-third" class="step">
    <!-- Step Info -->
    <div class="wizard-steps">
        <div class="row">
            <div class="col-sm-4 done">
                <span>1. Info. Perso.</span>
            </div>
            <div class="col-sm-4 done">
                <span>2. Demande</span>
            </div>
            <div class="col-sm-4 active">
                <span>3. Recap</span>
            </div>
        </div>
    </div>
    <!-- END Step Info -->
    <div class="row">

    <div class="w-100"></div>
    <div class="tab-wizard">
   
<style>
    #div_recap_res{
        display: none;
    }

    #div_recap{
        display: block;
    }

    @media only screen and (max-width:800px){
    #div_recap{
        display: none;
    }

    #div_recap_res{
        display: block;
    }
    #recap{
        position:relative; right:80px;
    }
    .recap_block{
        margin-left: 15%;
    }
}

@media only screen and (max-width:500px){
    #recap{
        position:relative; right:100px;
    }
}
</style>

    <div id="div_recap">
        <div class="card" id="recap">
            <div class="card-body card-body2">
                <div class="row center-block">
                    <div class="col-md-12">
                        <div class="block">
                            <div class="w-100"></div>
                                <div class="col">
                                
                                <h3 style="color: green"><i class="bi bi-check-circle-fill">Récapitulatif de votre inscription </i></h3>
        <div class="form-row table-responsive">
            <table id="example-datatable" class="table"  >
               
                
                <tbody>
                    
                    <tr class="space-row">                       
                        <th>Nom</th>
                        <td id="nom_tab"></td>
                        <th>Prénom(s)</th>
                        <td id="prenom_tab"></td>
                    </tr>
                    <tr class="space-row">                       
                        <th>Téléphone</th>
                        <td id="tel_tab"></td>                       
                        <th>E-mail</th>
                        <td id="mail_tab"></td>
                    </tr>
                    <tr class="space-row">                       
                        <th>Type stage</th>
                        <td id="type_tab"></td>                      
                        <th>Domaine</th>
                        <td id="domaine_tab"></td>
                    </tr>
                    <tr class="space-row">                       
                        <th>Date début</th>
                        <td id="debut_tab"></td>                      
                        <th>Date fin</th>
                        <td id="fin_tab"></td>
                    </tr>
                </tbody>
            </table>
            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </div>

    <div id="div_recap_res">
        <div class="card" id="recap">
            <div class="card-body card-body2">
                <div class="row center-block">
                    <div class="col-md-12 recap_block">
                        <div class="block" >
                            <div class="w-100"></div>
                                <div class="col" >
                                
                                <h3 style="color: green"><i class="bi bi-check-circle-fill">Récapitulatif de votre inscription </i></h3>
        <div class="form-row table-responsive">
            <table id="example-datatable" class="table"  >
               
                
                <tbody>
                    
                    <tr class="space-row">                       
                        <th>Nom</th>
                        <td id="nom_tabR"></td>
                    </tr>
                    <tr class="space-row">                       
                        <th>Prénom(s)</th>
                        <td id="prenom_tabR"></td>
                    </tr>
                    <tr class="space-row">                       
                        <th>Téléphone</th>
                        <td id="tel_tabR"></td>                       
                    </tr>
                    <tr class="space-row">                                             
                        <th>E-mail</th>
                        <td id="mail_tabR"></td>
                    </tr>
                    <tr class="space-row">                       
                        <th>Type stage</th>
                        <td id="type_tabR"></td>                      
                    </tr>
                    <tr class="space-row">                                           
                        <th>Domaine</th>
                        <td id="domaine_tabR"></td>
                    </tr>
                    <tr class="space-row">                       
                        <th>Date début</th>
                        <td id="debut_tabR"></td>                      
                    </tr>
                    <tr class="space-row">                                            
                        <th>Date fin</th>
                        <td id="fin_tabR"></td>
                    </tr>
                </tbody>
            </table>
            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>









    </div>
</div>

<div class="row">

</div>

   
   
  

</div>
<!-- END First Step -->
{{-- FIN RECAPITULATIF --}}


                    <!-- Form Buttons -->
                    <div class="form-bordered2 form-group2">
                        <div class="tab-wizard col-md-offset-6">
                            <input type="reset" class="btn btn-lg btn-warning" id="back2" value="Back">
                            <input type="submit" class="btn btn-lg btn-primary" id="next2" value="Next" onclick="resume()"></div>
                    </div>
                    <!-- END Form Buttons -->
                </form>
                <!-- END Wizard with Validation Content -->
                 
                 
                
                     </div>
                </div>
        
                
            </div>
        
        </div>
            
    </section>
  </div> <!-- container -->
 

  @include('front-office/partials.footer')
  
   <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
   <script src="{{ asset('back-office/assets/js/vendor/jquery.min.js') }}"></script>
   <script src="{{ asset('back-office/assets/js/vendor/bootstrap.min.js') }}"></script>
   <script src="{{ asset('back-office/assets/js/plugins.js') }}"></script>
   <script src="{{ asset('back-office/assets/js/app.js') }}"></script>

   <!-- Load and execute javascript code used only in this page -->
   <script src="{{ asset('back-office/assets/js/pages/formsWizard.js') }}"></script>
   <script>$(function(){ FormsWizard.init(); });</script>

   <script>
        var earrings = document.getElementById('idsession');
        earrings.style.visibility = 'hidden';
   </script>
</body>

</html>