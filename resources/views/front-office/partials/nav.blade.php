<nav class="navbar navbar-expand-md  navbar-static ms-navbar ms-navbar-white navbar-mode">
      <div class="container container-full">
        <div id="div-nav" class="navbar-header">
          <a class="navbar-brand" href="{{route('acceuil')}}">
           <img class="logo" src="../../front-office/assets/img/ANPTIC.jpg">
          </a>
        </div>

        
        
        <!--MENU-->
        <div class="collapse navbar-collapse" id="ms-navbar">
        <ul class="navbar-nav">
          <li class="nav-item dropdown {{ request()->is('/') ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/') }}" role="tab">Accueil</a>
          </li>
          <li class="nav-item dropdown {{ request()->is('demandesfront/create') ? 'active' : null }}">
            <a class="nav-link" href="{{ url('demandesfront/create') }}" role="tab">Demande de stage</a>
          </li>
          <li class="nav-item dropdown {{ request()->is('formconsulter') ? 'active' : null }}">
            <a class="nav-link" href="{{ url('formconsulter') }}" role="tab">Consulter sa demande</a>
          </li>
        </ul>
      </div>
      <div id="menu-div">
        <ul id="menu-ul">
          <li id="menu-icon" class="nav-item dropdown">
            <a class="nav-link" href="#" role="tab" id="deroulanta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-menu" onclick="togglemenu()"></i></a>
            <div id="menu-id2" class="dropdown-menu dropdown-menu-md-right">
              <a id="element-list1" class="dropdown-item" href="{{ url('/') }}">ACCUEIL</a>
              <div class="dropdown-divider"></div>
              <a id="element-list2" class="dropdown-item" href="{{ url('demandesfront/create') }}">DEMANDE DE STAGE</a>
              <div class="dropdown-divider"></div>
              <a id="element-list3" class="dropdown-item" href="#">DEMANDE D'EMPLOI</a>
              <div class="dropdown-divider"></div>
              <a id="element-list4" class="dropdown-item" href="{{ url('formconsulter') }}">CONSULTER SA DEMANDE</a>
            </div>
          </li>
        </ul>
      </div>

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade {{ request()->is('/') ? 'active' : null }}" id="{{ url('/') }}" role="tabpanel">...</div>
          <div class="tab-pane fade {{ request()->is('demandesfront/create') ? 'active' : null }}" id="{{ url('demandesfront/create') }}" role="tabpanel">...</div>
          <div class="tab-pane fade {{ request()->is('formconsulter') ? 'active' : null }}" id="{{ url('formconsulter') }}" role="tabpanel">...</div>
        </div>

      </div> <!-- container -->
    </nav>
