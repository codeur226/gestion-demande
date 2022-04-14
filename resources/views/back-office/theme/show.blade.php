<x-master-layout>

    <!-- Main Container -->
    <div id="main-container">
       @include('back-office/partials.header1')
   
       <!-- Page content -->
       <div id="page-content">
           @include('back-office/partials.header')
           <h1 class="text-center">Detail d'un théme</h1>

                    <!-- Datatables Content -->

                    <div class="block full">
                      <div class="block-title">
                          {{--<h2>Tous les thémes</h2>--}}
                      </div>

                      <div class="table-responsive">
                          <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                              <thead>
                                  <tr>
                                      <th>libelle</th>
                                      <th>description</th> 
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                  <tr>
                                     
                                      <td>{{$theme->libelle}}</td>
                                      <td>{{$theme->description}}</td>
                                  </tr>
                                  
                              </tbody>
                          </table>
                          <a href="{{ route('themes.index') }}" class="btn btn-primary btn-sm mr-2" >retour</a>
                      </div>
                  </div>
                  <!-- END Datatables Content -->

                  
                  

</x-master-layout>