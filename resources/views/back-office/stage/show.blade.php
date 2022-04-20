<x-master-layout>

<!-- Main Container -->
     <div id="main-container">
        @include('back-office/partials.header1')
    
        <!-- Page content -->
        <div id="page-content">
            <h2 class="text-center">Details du stage N° {{$demande->code}}   {{$demande->nom}} {{$demande->prenom}}</h2>

                     <!-- Datatables Content -->

                     <div class="block full">
                       <div class="block-title">
                           {{-- <h2>Liste des stages</h2> --}}
                       </div>

                       <div class="table-responsive"> 



                        {{-- @if ($demande!=null) --}}
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                          
                            <tbody>

                             <tr>
                                 <th>Domaine :</th>
                                 <td>{{getDirection($demande->direction_id)}}</td>
                             </tr>
                             <tr>
                                 <th>Etape :</th>
                                 <td>{{ getValeur($demande->etape) }}</td>
                             </tr>
                             <tr>
                                 <th>Note globale :</th>
                                 <td>{{ $demande->note_globale }}</td>
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
                                 <th>Type de stage :</th>
                                 <td>{{getValeur($demande->type)}}</td>
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
                                <th>commentaires sur le stage :</th>
                                <td>{{$demande->commentaires}}</td>
                            </tr>
                            <tr>
                                <th>Thème de stage :</th>
                                <td>{{getTheme($demande->theme_id)}}</td>
                            </tr>
                            </tbody>
                        </table>
   
                           <br>
                       <div style="width: 1000px;margin:auto">
                      {{-- @if (getValeur($demande->etape)!='Terminé')
                      <a href="{{ route('formaffecter', $demande->id) }}" class="btn btn-warning btn-lg mr-2" ><i class="fa fa-share-square"></i>Affecter</a>
                     @endif --}}
                     <a href="{{ route('stageencours') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a> 
                     <a href="{{ route('formnoter',$demande->id) }}" class="btn btn-warning btn-lg mr-2" ><i class="fa fa-pencil" aria-hidden="true"></i> Noter le stagiaire</a> 
                     <a href="{{ route('formtheme',$demande->id) }}" class="btn btn-success btn-lg mr-2" ><i class="fa fa-check-square"></i> Attribuer un thème</a> 
                        </div>
                        </div>
                   </div>
                  
                   <!-- END Datatables Content -->

                   <span class="material-icons">
                    </span>
                   
 
</x-master-layout>