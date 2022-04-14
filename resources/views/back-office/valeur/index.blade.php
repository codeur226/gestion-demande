<x-master-layout  title=" | Parametre">
   
            <!-- Main Container -->
            <div id="main-container">
             @include('back-office/partials.header1')
         
             <!-- Page content -->
             <div id="page-content">
               
    
                          <!-- Datatables Content -->
                          <a class="btn btn-success btn-sm" href="{{route('valeurs.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>Nouveau</a>
                          <div class="block full">
                            <div class="block-title">
                                {{--<h2>Tous les parametres</h2>--}}
                            </div>
    
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Valeur</th>
                                            <th>Paramètre</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                            <?php $number=0; ?>
                                       
                                        @foreach ($valeurs as $val)
                                        <?php $number++; ?>
                                            <td class="text-center"> {{$number}}</td>
                                            <td>{{$val->valeur}}</td>
                                            <td>{{$val->parametre ? $val->parametre->parametre :"pas de valeur"}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('valeurs.show', $val) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                                    <a href="{{ route('valeurs.edit', $val) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"  onClick=" event.preventDefault();suppressionConfirm('{{ $val->id }}')" ><i class="fa fa-trash-o fa-lg"></i></a>
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