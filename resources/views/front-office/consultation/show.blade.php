<x-application-layout title=" | Consultation">
  
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="shortcut icon" href="../../front-office/assets/img/favicon.png?v=3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../front-office/assets/css/preload.min.css">
    <link rel="stylesheet" href="../../front-office/assets/css/plugins.min.css">
    <link rel="stylesheet" href="../../front-office/assets/css/style.light-blue-500.min.css">
    
    {{--  edit welcomes --}} 
  
{{--start body--}}
<div class="container">
    <section class="mb-4">

     
        @if ($demande!=null)
                          
        <div class="card" >
            <div class="card-body card-body2" >                 
    
            <div class="row center-block">
                    <div class="col-md-12">
                        <h2>Détails de ma demande</h2>
                    {{-- <form id="" action="{{ route('consulter') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        @csrf --}}
                    <div class="block">              
    
                        <div class="w-100"></div>
                        <div class="col">
                            <span style="font-weight: bold ">Etat de la demande :</span>
                               
                                @if (getValeur($demande->etat)=='Acceptée')
                                <span style="color: green; font-weight: bold ">{{getValeur($demande->etat)}}</span>
                                    
                                @else
                                <span style="color: red; font-weight: bold ">{{getValeur($demande->etat)}}</span>
                                    
                                @endif
                             <br>
                         <span style="font-weight: bold ">Code : </span>{{$demande->code}} 
                         <br>
                         <span style="font-weight: bold "> Nom : </span>{{ $demande->nom }}
                         <br>
                         <span style="font-weight: bold ">  Prénom (s) : </span>{{ $demande->prenom }}
                         <br>
                         <span style="font-weight: bold "> Téléphone : </span>{{$demande->telephone}}
                         <br>
                         <span style="font-weight: bold "> E-mail : </span>{{$demande->email}}
                         <br>
                         <span style="font-weight: bold ">  Type de stage : </span>{{getValeur($demande->type)}}
                         <br>
                         <span style="font-weight: bold "> Domaine : </span>{{getDomaine($demande->direction_id)}}
                         <br>
                         <span style="font-weight: bold "> Date de début : </span>{{$demande->date_debut}}
                         <br>
                         <span style="font-weight: bold ">Date de fin : </span>{{$demande->date_fin}}
                         
                           
                        </div>
                       
    
                
                     </div>
                </div>
        
                
            </div>
    
    
    
    
       </div>
    </div>
                           @else




                           <div class="card" >
                            <div class="card-body card-body2" >                 
                    
                                <div class="row center-block">
                                    <div class="col-md-12">
                                            <h2>Détails de ma demande</h2>
                                        <div class="block">              
                    
                                            <div class="w-100"></div>
                                        
                                                {{-- CODE ICI --}}
                               <h2 style="color: red"> Aucune   demande ne correspond au code et a l'e-mail entrés !</h2>

                                    
                                        </div>
                                    </div>
                    
                                    
                                </div>
                        </div>
                    </div>

                           @endif
                           {{-- <a href="{{ route('formconsulter') }}" class="btn btn-primary btn-lg mr-2" >retour</a> --}}
                           <a href="{{ route('formconsulter') }}" class="btn btn-warning btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i>retour</a> 

                       </div>
                   </div>
                   <!-- END Datatables Content -->
    </section>
  </div> <!-- container -->
 
  {{--end body--}}

   
</x-application-layout>



















