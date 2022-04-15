<x-master-layout>

     <!-- Main Container -->
     <div id="main-container">
        @include('back-office/partials.header1')
    
        <!-- Page content -->
        <div id="page-content">
            <h1 class="text-center">Detail de la direction</h1>

                     <!-- Datatables Content -->

                     <div class="block full">
                       <div class="block-title">
                           {{--<h2>Toutes les directions</h2>--}}
                       </div>

                       <div class="table-responsive">
                           <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                               <thead>
                                   <tr>
                                      
                                       <th>Sigle</th>
                                       <th>Nom complet</th>
                                       
                                   </tr>
                               </thead>
                               <tbody>
                                   
                                   <tr>
                                      
                                       <td>{{$direction->libelle_court}}</td>
                                       <td>{{$direction->libelle_long}}</td>
                                       
                                   </tr>
                                   
                               </tbody>
                           </table>
                           <a href="{{ route('directions.index') }}" class="btn btn-primary btn-sm mr-2" >retour</a>
                       </div>
                   </div>
                   <!-- END Datatables Content -->

                   
                   
 
</x-master-layout>