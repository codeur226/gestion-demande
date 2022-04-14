<x-master-layout  title=" | config">
   

        <!-- Main Container -->
        <div id="main-container">
         @include('back-office/partials.header1')
     
         <!-- Page content -->
         <div id="page-content">
             
           {{--  @dump($produits); --}} 

                      <!-- Datatables Content -->
                      <a class="btn btn-success btn-sm" href="{{route('configs.create')}}"><i class="fas fa-plus"></i>Nouveau</a>
                      <div class="block full">
                        <div class="block-title">
                            {{--<h2>Tous les parametres</h2>--}}
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Session</th>
                                        <th>Profil</th>
                                        <th>Région</th>
                                        <th>Poste à pourvoir</th>
                                        <th>Quota</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <?php $number=0; ?>
                                        <?php $actif=""; ?>
                                   
                                    @foreach ($param_session_profil_regions as $pspr)
                                    <?php $number++; ?>
                                        <td class="text-center"> {{$number}}</td>
                                        
                                       
                                       
                                        
                                        <td>{{$pspr->session ? $pspr->session->session :"pas de valeur"}}</td>
                                        
                                        <td>{{$pspr->profil ? $pspr->profil->valeur :"pas de valeur"}}</td>
                                        <td>{{$pspr->region ? $pspr->region->valeur :"pas de valeur"}}</td>
                                        
                                        <td>{{$pspr->poste_a_pourvoir}}</td>
                                        <td>{{$pspr->quota}}</td>
                                        <td>
                                            @if ($pspr->etat==1)
                                                {{$actif="actif"}}
                                            


                                            
                                            @elseif ($pspr->etat==0)
                                            
                                            {{$actif="inactif"}}
                                            
                                           
                                            @endif 
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('configs.show', $pspr) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                                <a href="{{ route('configs.edit', $pspr) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm data-tooltip"><i class="fa fa-trash-o fa-lg"></i></a>
                                                {{--<a href="#" class="btn btn-danger btn-sm"  onClick=" event.preventDefault();suppressionConfirm('{{ $session->id }}')" ><i class="fa fa-trash-o fa-lg"></i></a>--}}  
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
