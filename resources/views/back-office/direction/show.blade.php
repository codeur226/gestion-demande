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
                                       <th>Domaine</th>
                                       
                                   </tr>
                               </thead>
                               <tbody>
                                   
                                   <tr>
                                      
                                       <td>{{$direction->libelle_court}}</td>
                                       <td>{{$direction->libelle_long}}</td>
                                       <td>{{$direction->domaine}}</td>
                                       
                                   </tr>
                                   
                               </tbody>
                           </table>
                           <a href="{{ route('directions.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                       </div>
                   </div>
                   <!-- END Datatables Content -->

                   
                   
 
</x-master-layout>