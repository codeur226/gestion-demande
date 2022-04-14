<x-master-layout  title=" | Permission">
   
            <!-- Main Container -->
            <div id="main-container">
             @include('back-office/partials.header1')
         
             <!-- Page content -->
             <div id="page-content">
               
    
                          <!-- Datatables Content -->
                          <a class="btn btn-success btn-sm" href="{{route('permissions.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>Nouveau</a>
                          <div class="block full">
                            <div class="block-title">
                                {{--<h2>Tous les parametres</h2>--}}
                            </div>
    
                            <div class="table-responsive">
                                <table class="table table-vcenter table-condensed table-bordered listepdf">
                                    <thead>
                                            <tr>
                                                <th>Libelle</th>
                                                <th>Action</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>{{$permission->nom}}</td>
                                                <td class="text-center">
                                                        <div class="btn-group">
                                                            {{-- @can('permission.update',Auth::user()) --}}
                                                            <a href="{{ route('permissions.edit',$permission) }}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                            {{-- @endcan --}}
                                                            {{-- @can('permission.delete',Auth::user()) --}}
                                                            <a href="#modal-confirm-delete" onclick="delConfirm({{ $permission->id }});" data-toggle="modal" title="Supprimer" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                                            {{-- @endcan --}}
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