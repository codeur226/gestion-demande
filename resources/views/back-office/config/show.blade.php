<x-master-layout>

    <!-- Main Container -->
    <div id="main-container">
       @include('back-office/partials.header1')
   
       <!-- Page content -->
       <div id="page-content">
           @include('back-office/partials.header')
           <h1 class="text-center">Detail de la session</h1>

                    <!-- Datatables Content -->

                    <div class="block full">
                      <div class="block-title">
                          {{--<h2>Tous les parametres</h2>--}}
                      </div>

                      <div class="table-responsive">
                          <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                              <thead>
                                  <tr>
                                     
                                      <th>Session</th>
                                      <th>Description</th>
                                      <th>Status</th>
                                      <th>Ouverture</th>
                                      <th>Fermeture</th>
                                      
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                  <tr>
                                     
                                    <td>{{$session->session}}</td>
                                    <td>{{$session->description}}</td>
                                    <td>
                                        @if ($session->actif==1)
                                            <input type="radio" id="huey" name="drone"  checked>
                                        


                                        
                                        @elseif ($session->actif==0)
                                        
                                            <input type="radio" id="huey2" name="drone"  disabled>
                                        
                                       
                                        @endif 
                                    </td>
                                    <td>{{$session->ouverture}}</td>
                                    <td>{{$session->fermeture}}</td>
                                      
                                  </tr>
                                  
                              </tbody>
                          </table>
                          <a href="{{ route('sessions.index') }}" class="btn btn-primary btn-sm mr-2" >retour</a>
                      </div>
                  </div>
                  <!-- END Datatables Content -->

                  
                  

</x-master-layout>