<x-master-layout  title=" | Permission">
   
            <!-- Main Container -->
            <div id="main-container">
             @include('back-office/partials.header1')
         
             <!-- Page content -->
             <div id="page-content">
                          <!-- Datatables Content -->
                          <a class="btn btn-success btn-sm" href="{{route('permissions.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une permission</a>
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
                                                            <a href="{{ route('permissions.edit',$permission) }}" data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a>
                                                            {{-- @endcan --}}
                                                            {{-- @can('permission.delete',Auth::user()) --}}
                                                            <a href="{{ route('permissions.destroy', $permission->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                                event.preventDefault(); 
                                                                if(confirm('Etes-vous sur de vouloir supprimer cette permission ?')) 
                                                                document.getElementById('{{ $permission->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                                            <form id="{{ $permission->id }}" method="post" action="{{ route('permissions.destroy', $permission->id) }}">
                                                                @csrf
                                                                @method("delete")
                                                            </form>
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