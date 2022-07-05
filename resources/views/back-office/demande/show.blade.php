

<x-master-layout>

<!-- Main Container -->
     <div id="main-container">
        @include('back-office/partials.header1')

        <div class="block">

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

        <!-- Page content -->
        <div id="page-content">
            <h3 class="text-center">Details de la demande N° {{$demande->code}}  de {{$demande->nom}} {{$demande->prenom}}</h3>

                     <!-- Datatables Content -->

                     <div class="block full">
                       <div class="block-title">
                           {{--<h2>Tous les parametres</h2>--}}
                       </div>

                       <div class="table-responsive">
                           <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                               <thead>
                                   <tr>

                                        <th>Type stage</th>
                                        <th>Domaine</th>
                                        <th>Spécialité</th>
                                       <th>Date de début souhaitée</th>
                                       <th>Date de fin souhaitée</th>
                                       <th>Etat</th>
                                       <th>Téléphone</th>
                                       <th>Pièces jointes</th>
                                   </tr>
                               </thead>

                               <tbody>

                                   <tr>

                                        <td>{{getValeur($demande->type)}}</td>
                                       <td>{{getDomaine($demande->direction_id)}}</td>
                                       @if($demande->specialite==NULL)
                                       <td>Aucune spécialité renseignée</td>
                                       @endif
                                       @if($demande->specialite!=NULL)
                                       <td>{{$demande->specialite}}</td>
                                       @endif
                                       <td>{{$demande->date_debut}}</td>
                                       <td>{{$demande->date_fin}}</td>
                                       <td>{{getValeur($demande->etat)}}</td>
                                       <td>{{$demande->telephone}}</td>
                                       <td width="25%">   @foreach ($pieces as $piece)
                                        <ul><li >
                                            {{-- <a href="{{$piece->url}}"> {{ $piece->libelle }}</a> --}}

                                            <a href="{{asset($piece->url) }}">{{ $piece->libelle }}</a>
                                            {{-- <a href="{{asset('{{$piece->url}}'}}"> {{ $piece->libelle }}</a> --}}

                                            @if(Auth::user()->role_id == 2)
                                            <a href="{{ route("supprimerpiece", $piece->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                event.preventDefault();
                                                if(confirm('Etes-vous sur de vouloir supprimer cette piece ?'))
                                                document.getElementById('{{ $piece->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                            <form id="{{ $piece->id }}" method="post" action="{{ route("supprimerpiece", $piece->id) }}">
                                                @csrf
                                                @method("delete")
                                            </form>
                                            @endif
                                        </li></ul>

                                        @endforeach </td>


                                   </tr>

                               </tbody>
                           </table>
                           <br>

                       <div style="width: 500px;margin:auto">

                           {{-- <a href="{{ route('validerstage', $demande->id) }}" class="btn btn-success btn-lg mr-2" ><i class="fa fa-check-square"></i> Valider</a> --}}

                           @if($url=='dashboard')
                           <a href="{{ route('admin') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                           @endif

                           @if($url=='demande')
                           <a href="{{ route('demandes.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                           @endif

                           @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                           <a href="{{ route('formreporter', $demande->id) }}" class="btn btn-danger btn-lg mr-2" ><i class="fa fa-repeat"></i> Reporter</a>

                           <a href="{{ route("validerstage", $demande->id) }}" class="btn btn-success btn-lg mr-2 btn_valider"  onClick="
                            event.preventDefault();
                            if(confirm('Voulez vous vraiment valider cette demande de stage ?'))
                            document.getElementById('{{ $demande->id }}').submit();" ><i class="fa fa-check-square"></i> Valider</a>
                        <form id="{{ $demande->id }}" method="post" action="{{ route("validerstage", $demande->id) }}">
                            @csrf
                            @method("GET")
                        </form>
                        @endif



                        </div>
                        </div>
                   </div>

                   <style>
                    .hidennn{
                        display: none;
                    }
                </style>
                
                <div id="div_id" class="hidennn">
                    <div id="ms-preload" class="ms-preload">
                        <div id="status">
                          <div class="spinner">
                            <div class="dot1"></div>
                            <div class="dot2"></div>
                          </div>
                        </div>
                      </div>
                </div>
                
                <script>
                    $(document).ready(function() {
                      $("#{{ $demande->id }}").submit(function() {
                        $("#div_id").removeClass("hidennn");
                      });
                    });
                </script>

                   <!-- END Datatables Content -->

                   <span class="material-icons">
                    </span>

</x-master-layout>

