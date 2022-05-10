<x-master-layout>

<!-- Main Container -->
     <div id="main-container">
        @include('back-office/partials.header1')

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

                                       <th>Domaine</th>
                                       <th>Type stage</th>
                                       <th>Date de début souhaitée</th>
                                       <th>Date de fin souhaitée</th>
                                       <th>Etape</th>
                                       <th>Etat</th>
                                       <th>Pièces jointes</th>
                                   </tr>
                               </thead>

                               <tbody>

                                   <tr>

                                       <td>{{$demande->domaine}}</td>
                                       <td>{{getValeur($demande->type)}}</td>
                                       <td>{{$demande->date_debut}}</td>
                                       <td>{{$demande->date_fin}}</td>
                                       <td>{{getValeur($demande->etape)}}</td>
                                       <td>{{getValeur($demande->etat)}}</td>
                                       <td width="25%">   @foreach ($pieces as $piece)
                                        <ul><li >
                                            {{-- <a href="{{$piece->url}}"> {{ $piece->libelle }}</a> --}}

                                            {{-- <a href="{{asset('storage/'.$piece->libelle) }}">{{ $piece->libelle }}</a> --}}
                                            <a href="{{$piece->url}}"> {{ $piece->libelle }}</a>
                                            <a href="{{ route("supprimerpiece", $piece->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                event.preventDefault();
                                                if(confirm('Etes-vous sur de vouloir supprimer cette piece ?'))
                                                document.getElementById('{{ $piece->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                            <form id="{{ $piece->id }}" method="post" action="{{ route("supprimerpiece", $piece->id) }}">
                                                @csrf
                                                @method("delete")
                                            </form>
                                        </li></ul>

                                        @endforeach </td>


                                   </tr>

                               </tbody>
                           </table>
                           <br>

                       <div style="width: 500px;margin:auto">

                           {{-- <a href="{{ route('validerstage', $demande->id) }}" class="btn btn-success btn-lg mr-2" ><i class="fa fa-check-square"></i> Valider</a> --}}
                           <a href="{{ route('demandes.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>

                           <a href="{{ route('formreporter', $demande->id) }}" class="btn btn-danger btn-lg mr-2" ><i class="fa fa-repeat"></i>Reporter</a>

                           <a href="{{ route("validerstage", $demande->id) }}" class="btn btn-success btn-lg mr-2"  onClick="
                            event.preventDefault();
                            if(confirm('Voulez vous vraiment valider cette demande de stage ?'))
                            document.getElementById('{{ $demande->id }}').submit();" ><i class="fa fa-check-square"></i> Valider</a>
                        <form id="{{ $demande->id }}" method="post" action="{{ route("validerstage", $demande->id) }}">
                            @csrf
                            @method("GET")
                        </form>



                        </div>
                        </div>
                   </div>

                   <!-- END Datatables Content -->

                   <span class="material-icons">
                    </span>


</x-master-layout>
