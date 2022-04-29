<x-master-layout  title=" | Stages validés">

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
           

                      <!-- Datatables Content -->
                      {{-- <a class="btn btn-success btn-sm" href="{{route('demandes.create')}}"><i class="fas fa-plus"></i>Nouveau</a> --}}
                      <div class="block full">
                        <div class="block-title">
                            <h2>Liste des stages terminés ({{ $stagetermines }})</h2>
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Code</th>
                                        <th>Nom & Prénom (s)</th>
                                        {{-- <th>Prénom (s)</th> --}}
                                        <th>E-mail</th>
                                        <th>Domaine</th>
                                        <th>Date debut</th>
                                        <th>Date fin</th>
                                        <th>Etape</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <?php $number=0; ?>
                                   
                                    @foreach ($demandes as $demande)
                                    <?php $number++; ?>
                                        <td class="text-center"> {{$number}}</td>
                                        <td>{{$demande->code}}</td>
                                        <td>{{$demande->nom}} {{" ".$demande->prenom}}</td>
                                        {{-- <td></td> --}}
                                        <td>{{$demande->email}}</td>
                                        <td>{{getDirection($demande->direction_id)}}</td>
                                        @if($demande->debutrenouv==null)                                       
                                        <td>{{$demande->date_debut}}</td>
                                        @else
                                        <td>{{$demande->debutrenouv}}</td>
                                        @endif
                                        @if($demande->finrenouv==null) 
                                        <td>{{$demande->date_fin}}</td>
                                        @else                                        
                                        <td>{{$demande->finrenouv}}</td>
                                        @endif
                                        <td>{{getValeur($demande->etape)}}</td>
                                         <td class="text-center" width="23%">
                                            <div class="btn-group">                                                
                                               <a title="Voir les détails" href="{{ route('voirStage', $demande->id) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>  {{-- <i class="fa fa-eye fa-lg"></i> --}}
                                                <a title="Renouveller" href="{{ route('renouveller', $demande->id) }}" class="btn btn-warning btn-sm mr-2" > renouveller</a>  {{--<i class="fa fa-repeat"></i> --}}
                                                {{-- <a href="{{ route('stagefini', $demande->id) }}" class="btn btn-danger btn-sm mr-2" >Mettre fin</a>  <i class="fa fa-trash"></i> --}}
                                            {{-- Bouton mettre fin au stage avec message de confirmation --}}
                                                {{-- <a href="{{ route("stagefini", $demande->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                    event.preventDefault(); 
                                                    if(confirm('Etes-vous sur de vouloir mettre fin a ce stage ?')) 
                                                    document.getElementById('{{ $demande->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                                <form id="{{ $demande->id }}" method="post" action="{{ route("stagefini", $demande->id) }}">
                                                    @csrf
                                                    @method("GET")
                                                </form> --}}

                                            
                                            
                                            
                                            
                                            
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Datatables Content -->

                    
                    
            
            </div>
        </div>  
</x-master-layout>