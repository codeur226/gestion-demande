<nav class="navbar navbar-expand-md  navbar-static ms-navbar ms-navbar-white navbar-mode">
      <div class="container container-full">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{route('acceuil')}}">
           <img src="../../front-office/assets/img/ANPTIC.jpg" alt="logo ANPTIC" width="90" height="90">

             <!-- <span class="ms-logo ms-logo-sm">M</span>
            <span class="ms-title">Material <strong>Style</strong></span> -->
          </a>
        </div>
        <div class="collapse navbar-collapse" id="ms-navbar">
          <ul class="navbar-nav">
            <li class="nav-item dropdown active">
              <a href="/" class="nav-link dropdown-toggle animated fadeIn animation-delay-7"  data-name="acceuil">Accueil</a>
              {{-- <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="acceuil">Acceuil</a> --}}
              
            </li>
            <li class="nav-item dropdown">
              <a href="{{ route('demandesfront.create') }}" >Demande de stage</a>
              
            </li>

            {{-- <li class="nav-item dropdown">
              <a href="#" >Demande d'emploi</a> --}}
              {{-- <a href="#" class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="inscription">Paiement</a> --}}
              
            {{-- </li> --}}


            <li class="nav-item dropdown dropdown-megamenu-container">
              <a href="{{ route('formconsulter') }}" >Consultation</a>
            </li>
            {{-- <li class="nav-item dropdown">
              <a href="{{ route('contact') }}"  class="nav-link dropdown-toggle animated fadeIn animation-delay-7" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" data-name="contact">Contact</a>
            </li> --}}
            
          </ul>
        </div>
        <a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu"><i class="zmdi zmdi-menu"></i></a>
      </div> <!-- container -->
    </nav>
