<!DOCTYPE html>
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'ANPTIC') }}</title>
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

           {{-- <div class="centerdiv">--}} 
            <div class="card" >
                <div class="card-body card-body2" >                 

            <div class="row center-block">
                {{-- <div class="col-md-6 offset-md-2"> --}}
                    <div class="col-md-12">
                    <h2 class="text-center">Consulter l'état de ma demande de stage</h2>
                    <form id="" action="{{ route('consulter') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf
                    <div class="block">              

                        <div class="w-100"></div>
                        <div class="col">
                           
                        </div>
                       

                        <div class="form-group">
                            <label  for="email">E-mail (<span style="color:red;">*</span>)</label>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="email" id="email" name="email" class="form-control form-control2" placeholder="nom@example.com" required>
                                </div>
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                            </div>
                        </div>                      
                     <div class="form-group">
                            <label  for="code">Code de votre demande (<span style="color:red;">*</span>)</label>
                        <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" id="code" name="code" class="form-control form-control2" placeholder="DS-XXXXXX" required>
                                </div>
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                            </div>
                        </div>


                      </div>
                    
                      
                      
                   
                    <div class="form-group form-actions">
                        <input type="submit" class="btn btn-lg btn-primary" id="" value="CONSULTER MA DEMANDE">
                        {{-- <a href="{{ route('formreporter', $demande->id) }}" class="btn btn-danger btn-lg mr-2" ><i class="fa fa-repeat"></i>Reporter</a> --}}
                      {{-- <input type="submit" class="btn btn-lg btn-primary"><i class="fa fa-user"></i> CONSULTER MA DEMANDE > --}}
                        {{-- <button type="reset" class="btn btn-lg btn-danger"><i class="fa fa-repeat"></i> Initialiser</button> --}}
                      </div>    
                    </form>
                    
                    <!-- END Form Buttons -->
                
                <!-- END Wizard with Validation Content -->
                 
            
                
                     </div>
                </div>
        
                
            </div>




       </div>
    </div>
{{--</div> --}}



        
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