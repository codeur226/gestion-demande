<x-master-layout  title=" | Renouvellement">

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
                            {{--<h2>Tous les renouvellements</h2>--}}
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">ID DEMANDE</th>
                                        <th>Date de début</th>
                                        <th class="text-center">Date de fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <?php $number=0; ?>
                                   
                                    @foreach ($liste as $param)
                                    <?php $number++; ?>
                                        <td class="text-center"> {{$number}}</td>
                                       
                                        <td>{{$param->demande_id}}</td>
                                        <td>{{$param->date_debut}}</td>
                                        <td>{{$param->date_fin}}</td>
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
