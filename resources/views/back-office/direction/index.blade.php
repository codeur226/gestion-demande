<x-master-layout  title=" | Direction">

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
                      <a class="btn btn-success btn-sm" href="{{route('directions.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter une direction</a>
                      <div class="block full">
                        <div class="block-title">
                            {{--<h2>Toutes les directions</h2>--}}
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Sigle</th>
                                        <th>Nom complet</th>
                                        <th>Domaine</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <?php $number=0; ?>
                                   
                                    @foreach ($directions as $domain)
                                    <?php $number++; ?>
                                        <td class="text-center"> {{$number}}</td>
                                       
                                        <td>{{$domain->libelle_court}}</td>
                                        <td>{{$domain->libelle_long}}</td>
                                        <td>{{$domain->domaine}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('directions.show', $domain) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                                <a href="{{ route('directions.edit', $domain) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a>
                                                <a href="{{ route("directions.destroy", $domain->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                    event.preventDefault(); 
                                                    if(confirm('Etes-vous sur de vouloir supprimer cette direction ?')) 
                                                    document.getElementById('{{ $domain->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                                <form id="{{ $domain->id }}" method="post" action="{{ route("directions.destroy", $domain->id) }}">
                                                    @csrf
                                                    @method("delete")
                                                </form>

                                                {{--<a href="#" class="btn btn-danger btn-sm"  onClick=" event.preventDefault();suppressionConfirm('{{ $domain->id }}')" ><i class="fa fa-trash-o fa-lg"></i></a>--}}  
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
