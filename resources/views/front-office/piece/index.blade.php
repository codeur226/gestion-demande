<x-master-layout  title=" | Liste des pièces jointes">

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
                    <!--  <a class="btn btn-success btn-sm" href="{{route('renouvellement.create')}}"><i class="fas fa-plus"></i>Nouveau</a>  -->
                      <div class="block full">
                        <div class="block-title">
                            {{--<h2>Liste des pièces jointes</h2>--}}
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">ID DEMANDE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <?php $number=0; ?>
                                   
                                    @foreach ($liste as $liste)
                                    <?php $number++; ?>
                                        <td class="text-center"> {{$number}}</td>
                                       
                                        <td>{{$liste->id}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('piece.show', $liste->id) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                                  
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
