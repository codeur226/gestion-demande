<x-master-layout  title=" | thèmes">
   
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
                      <a class="btn btn-success btn-sm" href="{{route('themes.create')}}"><i class="fa fa-plus"></i> Ajouter un thème</a>
                      <div class="block full">
                        <div class="block-title">
                            {{--<h2>Tous les thèmes</h2>--}}
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                       
                                        <th>libelle</th>
                                        <th>Description</th>
                                       
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                @foreach ($themes as $theme)
                                    <tr>     
                                        <td>{{$theme->libelle}}</td>
                                        <td>{{$theme->description}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('themes.show', $theme) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                                <a href="{{ route('themes.edit', $theme) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a>
                                                <a href="{{ route('themes.destroy', $theme) }}" class="btn btn-danger btn-sm mr-2" onClick="event.preventDefault(); if(confirm('Etes-vous sur de vouloir supprimer ce thème ?'))
                                                document.getElementById('{{$theme->id}}').submit();"  ><i class="fa fa-trash-o fa-lg"></i></a>
                                                <form id="{{ $theme->id }}" method="post" action="{{ route('themes.destroy', $theme) }}">
                                        @csrf
                                        @method("DELETE")
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
