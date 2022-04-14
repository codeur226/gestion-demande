<x-master-layout  title=" | Role">

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
                      {{-- <a class="btn btn-success btn-sm" href="{{route('parametres.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>Nouveau</a> --}}

                      <a class="btn btn-success btn-sm" href="{{route('roles.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>Nouveau</a>
                      <div class="block full">
                        <div class="block-title">
                            {{--<h2>Tous les roles</h2>--}}
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">NOM DU ROLE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <?php $number=0; ?>
                                   
                                    @foreach ($liste as $param)
                                    <?php $number++; ?>
                                        <td class="text-center"> {{$number}}</td>
                                       
                                        <td>{{$param->nom}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('roles.show', $param) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                                <a href="{{ route('roles.edit', $param) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a>
                                                <a href="{{ route('roles.destroy', $param) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                    event.preventDefault(); 
                                                    if(confirm('Etes-vous sur de vouloir supprimer ce role ?')) 
                                                    document.getElementById('{{ $param->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                                <form id="{{ $param->id }}" method="post" action="{{ route('roles.destroy', $param) }}">
                                                    @csrf
                                                    @method("delete")
                                                </form>

                                                {{--<a href="#" class="btn btn-danger btn-sm"  onClick=" event.preventDefault();suppressionConfirm('{{ $param->id }}')" ><i class="fa fa-trash-o fa-lg"></i></a>--}}  
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
