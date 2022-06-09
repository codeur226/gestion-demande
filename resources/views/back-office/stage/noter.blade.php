<x-master-layout  title=" | Note un stagiaire">
   
    <!-- Main Container -->
    <div id="main-container">
     @include('back-office/partials.header1')
 
     <!-- Page content -->
     <div id="page-content">
        
     
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2>Attribuer une note au stagiaire</h2>
            </div>

            <div class="row">
                @if(session()->has('message'))
                <div class="alert alert-danger">
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
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
           
            <form method="post" action="{{ route('noter') }}" enctype="multipart/form-data">
                @method('POST')
               @include('back-office/partials._noter-form')
             </form>
            

            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
 


        </div>
    </div>


</x-master-layout>