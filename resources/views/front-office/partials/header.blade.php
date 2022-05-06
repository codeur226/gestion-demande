
 <!-- ms-hero-material -->
 <header class="ms-hero mb-6" style="background-color:#fff;">
  <div id="carousel-header" class="carousel carousel-header">
    <!-- Indicators -->
   <!-- <ol class="carousel-indicators">
      <li data-target="#carousel-header" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-header" data-slide-to="1"></li>
      <li data-target="#carousel-header" data-slide-to="2"></li>
    </ol>
    -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="carousel-caption">
              <h1 style="color: black;">
                  <p class="monserrat" style="text-align:center;font-size: 2.0rem;font-weight:bold;"> Bienvenue sur la plateforme de demande de stages et d'emplois</p>
                  {{-- <p class="monserrat" style="font-size: 2.0rem;"></p> --}}
         
                  <p class="monserrat" style="text-align:center;font-size: 1.5rem;">Faites vos demandes de stages entièrement en ligne</p>
                  
                </h1>
                <div class="text-center">
                  <a href="{{ route('demandesfront.create') }}" class="monserrat btn btn-primary btn-xlg  animated flipInX animation-delay-16 inscription_btn">DEMANDE DE STAGE</a>
                  <a href="#" class="monserrat btn btn-primary btn-xlg  animated flipInX animation-delay-16 inscription_btn">DEMANDE D'EMPLOI</a>
                 
                </div></div>
            </div>
           
          </div>
        </div>
      </div> 
    </div>
  </div>
</header>