<x-master-layout>

     <!-- Main Container -->
     <div id="main-container">
        @include('back-office/partials.header1')
    
        <!-- Page content -->
        <div id="page-content">
            <h1 class="text-center">Detail de l'utilisateur</h1>

                     <!-- Datatables Content -->

                     <div class="block full">
                       <div class="block-title">
                           {{--<h2>Tous les utilisateurs</h2>--}}
                       </div>

                       <div class="table-responsive">
                           <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                               <thead>
                                   <tr>
                                      
                                       <th>Nom</th>
                                       <th>Prénom</th>
                                       <th>Numéro de téléphone</th>
                                       <th>Email</th>
                                       <th>Direction</th>
                                       
                                   </tr>
                               </thead>
                               <tbody>
                                   
                                   <tr>
                                      
                                       <td>{{$user->nom}}</td>
                                       <td>{{$user->prenom}}</td>
                                       <td>{{$user->telephone}}</td>
                                       <td>{{$user->email}}</td>
                                       <td>{{getDirection($user->direction_id)}}</td>
                                       
                                   </tr>
                                   
                               </tbody>
                           </table>
                           <a href="{{ route('listeUser') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                       </div>
                   </div>
                   <!-- END Datatables Content -->

                   
                   
 
</x-master-layout>