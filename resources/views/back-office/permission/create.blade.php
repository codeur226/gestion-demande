<x-master-layout  title=" | Permission">
    
    <!-- Main Container -->
    <div id="main-container">
        @include('back-office/partials.header1')
    
        <!-- Page content -->
        <div id="page-content">
           
        
           <!-- Horizontal Form Block -->
           <div class="block">
               <!-- Horizontal Form Title -->
               <div class="block-title">
                   {{--<div class="block-options pull-right">
                       <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                    </div>--}}
                   <h2>Ajouter une permission</h2>
                </div>
               <!-- END Horizontal Form Title -->
   
               <!-- Horizontal Form Content -->
              
                <form id="form-validation" method="POST"  action="{{route('permissions.store')}}" class="form-horizontal form-bordered">
                    @csrf
                    @method('POST')
                    @include('back-office/partials._create_permission-form')
                </form>
               <!-- END Horizontal Form Content -->
           </div>
           <!-- END Horizontal Form Block -->
      
           </div>
       </div>  

</x-master-layout>