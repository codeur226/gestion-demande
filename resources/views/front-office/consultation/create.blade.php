<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <title>ProUI - Responsive Bootstrap Admin Template</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <link rel="shortcut icon" href="../../front-office/assets/img/favicon.png?v=3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../front-office/assets/css/preload.min.css">
    <link rel="stylesheet" href="../../front-office/assets/css/plugins.min.css">
    <link rel="stylesheet" href="../../front-office/assets/css/style.light-blue-500.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">




    <!-- Stylesheets -->
  



    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="../../back-office/assets/css/main.css">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="../../back-office/assets/css/themes.css">
    <!-- END Stylesheets -->


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
                    <h1 class="text-center">Consultation inscription</h1>
                

                    <!-- Progress Bar Wizard Block -->
                    <div class="block">
                     <!-- Progress Bars Wizard Title -->
                     <!--<div class="block-title">
                         <h2><strong>Barre Progression</strong></h2>
                     </div>-->
                     <!-- END Progress Bar Wizard Title -->
             
                     <!-- Progress Bar Wizard Content -->
                     <div class="row">
                         
                         <div class="col-md-12">
                             <!-- Wizard Progress Bar, functionality initialized in js/pages/formsWizard.js 
                             <div class="progress progress-striped active">
                                 <div id="progress-bar-wizard" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
                             </div>-->
                             <!-- END Wizard Progress Bar -->
             
                             <!-- Progress Wizard Content -->
                             <form id="advanced-wizard" action=" {{route('consultationform')}}" method="post" class="form-horizontal">
                                    @csrf 
                                <!-- First Step -->
                                 <div id="progress-first" class="step">
                                    <div class="row">
                                          <div class="col"> <label  for="example-numerolongcnib">N° Identification unique (<span style="color:red;">*</span>)</label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" id="numerolongcnib" name="numerolongcnib" class="form-control" >
                                                    </div>
                                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                                </div>
                                          
                                          </div>
                                          
                                          <div class="col"> <label  for="example-recep">N° Récepissé (<span style="color:red;">*</span>)</label>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" id="recepisse" name="recepisse" class="form-control" >
                                                </div>
                                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                            </div>
                                         </div>
                                         <div class="form-group form-actions">
                                            <div class="col-md-8 col-md-offset-4">
                                                <input type="submit" class="btn btn-lg btn-primary" id="next2" value="Next">
                                            </div>
                                        </div>

                                      </div>
                                 </div>
                             </form>
                             <!-- END Progress Wizard Content -->


                             <!-- Progress Wizard Content -->
                             @if($inscriptions != null)
                             <form id="progress-wizard2" action=" {{route('consultation')}}" method="post" class="form-horizontal">
                                @csrf 
                            <!-- First Step -->
                             <div id="progress-first" class="step">
                                <div class="row">
                                
                                      <div class="w-100"></div>
                                      <div class="col">
                                        <div class="form-group">
                                            <label  for="example-nom">Nom : </label>
                                            {{$inscriptions->nom}}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-prenom">Prénom(s) : </label>
                                                {{$inscriptions->prenom}}
                                        </div>
                                    </div>

                                    <div class="w-100"></div>
                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-telephone">Téléphone : </label>
                                                {{$inscriptions->telephone}}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-sexe">Sexe : </label>
                                                {{$inscriptions->sexe->valeur}}
                                         </div>
                                    </div>
                                     
                                    <div class="w-100"></div>

                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-naissance_date">Date Naissance : </label>
                                                {{$inscriptions->date_naissance}}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-lieu_naissance">Lieu Naissance : </label>
                                                {{$inscriptions->lieu_naissance}}
                                        </div>
                                    </div>

                                    <div class="w-100"></div>
                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-num_p_prevenir">N° Personne à prevenir en cas de besoin : </label>
                                                {{$inscriptions->numero_personne_prevenir}}
                                            </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-ref_piece">Réf. Pièce : </label>
                                                {{$inscriptions->ref_piece}}
                                         </div>
                                    </div>

                                    <div class="w-100"></div>
                                    <div class="col">
                                        <div class="form-group">
                                                <label  for="example-delivrance_date">Date Délivrance Pièce : </label>
                                                {{$inscriptions->delivre_le}}
                                            </div>
                                    </div>
                                    
                                  </div>
                             </div>
                             <!-- END First Step -->
         
                             <!-- Second Step -->
                           
                             <!-- END Second Step -->
         
                             <!-- Third Step -->
                             
                             <!-- END Third Step -->
                             
         
                             <!-- Form Buttons
                             <div class="form-group form-actions">
                                <div class="col-md-8 col-md-offset-4">
                                    <input type="reset" class="btn btn-lg btn-warning" id="back2" value="Back">
                                    <input type="submit" class="btn btn-lg btn-primary" id="next2" value="Next">
                                </div>
                            </div> -->
                             <!-- END Form Buttons -->
                         </form>
                         @endif


                         </div>
                     </div>
                     <!-- END Progress Bar Wizard Content -->
                 </div>
                 <!-- END Progress Bar Wizard Block -->  
                 
                 
                
                   
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