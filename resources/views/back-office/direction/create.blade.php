<x-master-layout  title=" | Direction">
   
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
                <h2>Ajouter une direction</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
           
            <form method="post" action="{{route('directions.store')}}" enctype="multipart/form-data">
                @method('POST')
               @include('back-office/partials._direction_param-form')
             </form>
            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
 


        </div>
    </div>


</x-master-layout>