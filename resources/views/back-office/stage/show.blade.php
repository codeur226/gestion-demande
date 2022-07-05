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
            <h2 class="text-center">Details du stage N° {{$demande->code}}   {{$demande->nom}} {{$demande->prenom}}</h2>

                     <!-- Datatables Content -->

                     <div class="block full">
                       <div class="block-title">
                           {{-- <h2>Liste des stages</h2> --}}
                       </div>

                       <div class="table-responsive"> 
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                          
                            <tbody>

                            <tr>
                                <th>Maitre de stage :</th>
                                <td>{{getMaitreStage($demande->maitre_stage)}}</td>
                            </tr>
                            <tr>
                                <th>Type de stage :</th>
                                <td>{{getValeur($demande->type)}}</td>
                            </tr>
                            <tr>
                                <th>Domaine :</th>
                                <td>{{getDirection($demande->direction_id)}}</td>
                            </tr>
                            @if($demande->specialite==NULL)
                            <tr>
                                <th>Spécialité :</th>
                                <td>Aucune spécialité renseignée</td>
                            </tr>
                            @endif
                            @if($demande->specialite!=NULL)
                            <tr>
                                <th>Spécialité :</th>
                                <td>{{$demande->specialite}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Etat :</th>
                                <td>{{ getValeur($demande->etat) }}</td>
                            </tr>
                            <tr>
                                <th>Etape :</th>
                                <td>{{ getValeur($demande->etape) }}</td>
                            </tr>
                            <tr>
                                <th>Statut :</th>
                                <td>{{ getValeur($demande->statut) }}</td>
                            </tr>
                            <tr>
                                <th>Téléphone :</th>
                                <td>{{$demande->telephone}}</td>
                            </tr>
                            <tr>
                                <th>E-mail :</th>
                                <td>{{$demande->email}}</td>
                            </tr>
                             <tr>
                                 <th>Date de début :</th>
                                 <td>{{$demande->date_debut}}</td>
                             </tr>
                             <tr>
                                 <th>Date de fin :</th>
                                 <td>{{$demande->date_fin}}</td>
                             </tr>
                            <tr>
                                <th>Renouvellement début :</th>
                                <td>{{$renouvellement_date_debut}}</td>
                            </tr>
                            <tr>
                                <th>Rénouvellement fin :</th>
                                <td>{{$renouvellement_date_fin}}</td>
                            </tr>
                            <tr>
                                <th>Thème de stage :</th>
                                <td>{{getTheme($demande->theme_id)}}</td>
                            </tr>
                            <tr>
                                <th>Note globale :</th>
                                <td>{{ $demande->note_globale }}</td>
                            </tr>
                            <tr>
                                <th>Commentaires sur le stage :</th>
                                <td>{{$demande->commentaires}}</td>
                            </tr>
                            <tr>
                                <th>Motif de fin de stage :</th>
                                @if($demande->motif==NULL && $demande->etat == 9 && $demande->etape==10)
                                <td> Fin de la période de stage</td>
                                @endif
                                @if($demande->motif!=NULL && $demande->etat == 9 && $demande->etape==10)
                                <td>{{$demande->motif}}</td>
                                @endif
                                @if($demande->motif==NULL && $demande->etat == 9 && $demande->etape!=10)
                                <td>Néant</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Pièces jointes :</th>
                                <td>   @foreach ($pieces as $piece)
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
                       <div style="width: 1000px;margin:auto">
                        @if($demande->etat == 9 && $demande->etape == 25)
                        @if($demande->statut == 12 || $demande->statut == 24)
                            <a href="{{ route('stagevalides') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                            @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 6)
                            <a href="{{ route('formtheme',$demande->id) }}" class="btn btn-warning btn-lg mr-2" ><i class="fa fa-check-square"></i> Attribuer un thème</a>
                            @endif
                            @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                            <a href="{{ route('encours', $demande->id) }}" class="btn btn-success btn-lg mr-2" onClick="
                                event.preventDefault(); 
                                if(confirm('Etes-vous sur de vouloir démarrer ce stage ?')) 
                                document.getElementById('{{ $demande->id }}').submit();"><i class="fa fa-square"></i> Démarrer un stage</a>
                                <form id="{{ $demande->id }}" method="post" action="{{ route("encours", $demande->id) }}">
                                    @csrf
                                    @method("GET")
                                </form>
                            @endif
                            @endif
                        @endif
                        @if($demande->etat == 9 && $demande->etape == 11)
                        @if($demande->statut == 12 || $demande->statut == 24)
                            <a href="{{ route('stageencours') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                            @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 6)
                            <a href="{{ route('formtheme',$demande->id) }}" class="btn btn-success btn-lg mr-2" ><i class="fa fa-check-square"></i> Attribuer un thème</a>
                            <a href="{{ route('formnoter',$demande->id) }}" id="noter1" class="btn btn-warning btn-lg mr-2" ><i class="fa fa-pencil" aria-hidden="true"></i> Noter le stagiaire</a>
                            @endif
                            @endif
                        @endif
                        @if($demande->etat == 9 && $demande->etape == 10)
                        @if($demande->statut == 12 || $demande->statut == 24)
                            <a href="{{ route('stagetermines') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                            @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 6)
                            <a href="{{ route('formtheme',$demande->id) }}" class="btn btn-success btn-lg mr-2" ><i class="fa fa-check-square"></i> Attribuer un thème</a>
                            <a href="{{ route('formnoter',$demande->id) }}" id="noter2" class="btn btn-warning btn-lg mr-2" ><i class="fa fa-pencil" aria-hidden="true"></i> Noter le stagiaire</a>
                            @endif
                            @endif
                        @endif
                        <a href="#" class="btn btn-danger btn-lg mr-2" data-toggle="modal" data-target="#ModalDownload{{$demande->id}}"><i class="fa fa-upload" aria-hidden="true"></i> Enregistrer un fichier</a>
                     
                        </div>
                        </div>
                   </div>

                   @include('back-office.stage.modal.download')
                  
                   <!-- END Datatables Content -->

                   <span class="material-icons">
                    </span>
                   
 
</x-master-layout>

@if($demande->theme==NULL && $demande->maitre_stage==NULL)
<style>
    #noter1{
        pointer-events: none;
        background-color:lightgray; !important
    }

    #noter2{
        pointer-events: none;
        background-color:lightgray; !important
    }
</style>
@endif