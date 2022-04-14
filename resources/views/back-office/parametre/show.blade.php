<x-master-layout>

     <!-- Main Container -->
     <div id="main-container">
        @include('back-office/partials.header1')
    
        <!-- Page content -->
        <div id="page-content">
            @include('back-office/partials.header')
            <h1 class="text-center">Detail du Parametre</h1>

                     <!-- Datatables Content -->

                     <div class="block full">
                       <div class="block-title">
                           {{--<h2>Tous les parametres</h2>--}}
                       </div>

                       <div class="table-responsive">
                           <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                               <thead>
                                   <tr>
                                      
                                       <th>Paramètre</th>
                                       
                                   </tr>
                               </thead>
                               <tbody>
                                   
                                   <tr>
                                      
                                       <td>{{$parametre->parametre}}</td>
                                       
                                   </tr>
                                   
                               </tbody>
                           </table>
                           <a href="{{ route('parametres.index') }}" class="btn btn-primary btn-sm mr-2" >retour</a>
                       </div>
                   </div>
                   <!-- END Datatables Content -->

                   
                   
 
</x-master-layout>