<x-master-layout  title=" | Thème de stage">
   
    <!-- Main Container -->
    <div id="main-container">
     @include('back-office/partials.header1')
 
     <!-- Page content -->
     <div id="page-content">
        
     <a class="btn btn-success btn-sm" href="{{route('themes.create')}}"><i class="fa fa-plus"></i> Nouveau</a>
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2>Attribuer un thème</h2>
            </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
           
            <form method="post" action="{{ route('theme') }}" enctype="multipart/form-data">
                @method('POST')
               @include('back-office/partials._themeStage-form')
             </form>
            

            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
 


        </div>
    </div>


</x-master-layout>