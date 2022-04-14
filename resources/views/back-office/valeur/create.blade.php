<x-master-layout  title=" | valeur">
   
    <!-- Main Container -->
    <div id="main-container">
     @include('back-office/partials.header1')
 
     <!-- Page content -->
     <div id="page-content">
       

{{--body--}}
         <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">
                    
                        <h1>Ajouter une valeur</h1>
                        <hr/>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    
                    {{--enctype="multipart/form-data" to send data by form--}}
                    
        
                 <form method="post" action="{{route('valeurs.store')}}" enctype="multipart/form-data">
                    @method('POST')
                   @include('back-office/partials._valeur-form')
                 </form>
                </div>
            </div>
        
        </div>
 


        </div>
    </div>


</x-master-layout>