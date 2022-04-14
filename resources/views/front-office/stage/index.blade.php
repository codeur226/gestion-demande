<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <title>Demand de stage</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <link rel="shortcut icon" href="../../front-office/assets/img/favicon.png?v=3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../front-office/assets/css/preload.min.css">
    <link rel="stylesheet" href="../../front-office/assets/css/plugins.min.css">
    <link rel="stylesheet" href="../../front-office/assets/css/style.light-blue-500.min.css">
    




    <!-- Stylesheets -->
  



    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="../../back-office/assets/css/main.css">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="../../back-office/assets/css/themes.css">
    <!-- END Stylesheets -->

    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <!-- Modernizr (browser feature detection library) -->
    <script src="../../back-office/assets/js/vendor/modernizr.min.js"></script>
</head>
<body class="color_white">
    





{{--start body--}}
<div class="ms-site-container"  style="background-color:#fff;">
    @include('front-office/partials.nav')
    <section class="mb-4">
        <div class="container">
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
            <div class="row">
                {{-- <div class="col-md-6 offset-md-2"> --}}
                    <div class="col-md-12">
                    <h1 class="text-center">DEMANDE DE STAGE</h1>
                    <div class="block">
                        <!-- Progress Bars Wizard Title -->
                        <div class="block-title">
                            <h2><strong>Inscrivez-vous en suivant les étapes</strong></h2>
                        </div>

                   <!-- Wizard with Validation Content -->
                   <form id="progress-wizard" action=" {{route('demandesfront.store')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf
                    <!-- First Step -->
                    <div id="advanced-first" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-sm-6 active">
                                    <span>1. Info. Perso.</span>
                                </div>
                                <div class="col-sm-6">
                                    <span>2. Demande</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="row">

                        <div class="w-100"></div>
                        <div class="col">
                            <div class="form-group">
                                    <label  for="nom">Nom (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" id="nom" name="nom" class="form-control" >
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
                                            <input type="text" id="prenom" name="prenom" class="form-control" required></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                    <label  for="example-telephone">Téléphone (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" id="telephone" name="telephone" class="form-control" required></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                    <label  for="email">E-mail (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" id="email" name="email" class="form-control" required></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>

                       
                       
                      

                    </div>
                    <!-- END First Step -->

                    <!-- Second Step -->
                    <div id="advanced-second" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-sm-6 done">
                                    <span>1. Info. Perso.</span>
                                </div>
                                <div class="col-sm-6 active" >
                                    <span>2. Demande</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                      
                        <div class="row">
                        <div class="w-100"></div>
                        <div class="col"> <label  for="typestage">Type de stage (<span style="color:red;">*</span>)</label>
                            <select class="form-control" name="typestage" id="typestage">
                                @foreach($typestages as $typestage)
                                
                                <option value="{{$typestage->id}}">{{$typestage->valeur}}</option>
                                    
                                @endforeach 
                             
                               </select>
                              {{-- <span class="help-block">Saisir le profil</span> --}}
                              @error('typestage')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                          
                          </div>
                          <div class="col"> <label  for="domaine">Domaine (<span style="color:red;">*</span>)</label>
                            <select class="form-control" name="domaine" id="domaine">
                                @foreach($domaines as $domaine)
                                
                                <option value="{{$domaine->id}}">{{$domaine->valeur}}</option>
                                    
                                @endforeach 
                             
                               </select>
                              {{-- <span class="help-block">Saisir le profil</span> --}}
                              @error('domaine')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                          
                          </div>

                     
                         
                        <div class="w-100"></div>
                        <div class="col">
                            <div class="form-group">
                                    <label  for="datedebut">Date début (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="date" id="datedebut" name="datedebut" class="form-control" required></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                    <label  for="datefin">Date fin (<span style="color:red;">*</span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="date" id="datefin" name="datefin" class="form-control" required></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>


                        <div class="w-100"></div>
                        <div class="col">
                            <div class="form-group">
                                    <label  for="cv">Joindre votre CV (<span style="color:red;"></span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="file" name="cv" class="form-control" accept=".pdf"  > 
                                            {{-- required title="Ce champs est obligatoire !!" --}}
                                           
                                            <input type="file" id="cv" name="cv" class="form-control" ></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                    <label  for="diplome">Joindre votre diplôme/attestation (<span style="color:red;"></span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="file" id="diplome" name="diplome" class="form-control" ></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>

                         <div class="w-100"></div>
                        <div class="col">
                            <div class="form-group">
                                    <label  for="lettrerecommandation">Joindre votre lettre de recommandation (<span style="color:red;"></span>)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="file" id="lettrerecommandation" name="lettrerecommandation" class="form-control" ></div>
                                        </div>
                                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                    </div>
                        </div>
    
                </div>
                    </div>
                    
                    <!-- END Second Step -->

                   
                    <br>
                    <!-- END third Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="reset" class="btn btn-lg btn-warning" id="back2" value="Back">
                            <input type="submit" class="btn btn-lg btn-primary" id="next2" value="Next">
                        </div>
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
   <script src="../../back-office/assets/js/vendor/jquery.min.js"></script>
   <script src="../../back-office/assets/js/vendor/bootstrap.min.js"></script>
   <script src="../../back-office/assets/js/plugins.js"></script>
   <script src="../../back-office/assets/js/app.js"></script>

   <!-- Load and execute javascript code used only in this page -->
   <script src="../../back-office/assets/js/pages/formsWizard.js"></script>
   <script>$(function(){ FormsWizard.init(); });</script>

   <script>
        var earrings = document.getElementById('idsession');
        earrings.style.visibility = 'hidden';
   </script>

   
</body>


</html>