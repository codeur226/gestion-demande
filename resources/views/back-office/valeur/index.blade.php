<x-master-layout  title=" | Parametre">
   
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
                          <a class="btn btn-success btn-sm" href="{{route('valeurs.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une valeur</a>
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
                                                    <a href="{{ route('valeurs.destroy', $val->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                        event.preventDefault(); 
                                                        if(confirm('Etes-vous sur de vouloir supprimer cette valeur ?')) 
                                                        document.getElementById('{{ $val->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                                    <form id="{{ $val->id }}" method="post" action="{{ route('valeurs.destroy', $val->id) }}">
                                                        @csrf
                                                        @method("delete")
                                                    </form>
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