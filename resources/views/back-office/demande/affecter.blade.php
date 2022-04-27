<x-master-layout>

<!-- Main Container -->
     <div id="main-container">
        @include('back-office/partials.header1')
    
        <!-- Page content -->
        <div id="page-content">
            {{-- @include('back-office/partials.header') --}}
           
     
            <h3 class="text-center">Affecter le stagiaire <span style="color: green; font-text:bold;">{{ $demande->nom }} {{ $demande->prenom }} </span>à un maitre de stage </h3> 
            {{-- <i class="fa fa-stack-exchange" aria-hidden="true"></i> --}}

                     <!-- Datatables Content -->

                     <div class="block full">
                       <div class="block-title">
                           {{--<h2>Tous les parametres</h2>--}}
                       </div>


                       <form method="post" action="{{route('affecter')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf

                        <div class="form-group">
                             <input value="{{ $demande->id }}" type="hidden" name="iddemande" id="iddemande">

                          <label for="maitre">Choisissez le Maitre de stage</label>
                          <select class="form-control" name="maitre" id="maitre">
                            @foreach($users as $user)
                            
                            <option {{ ($user->id OR old('user_id')==$user->id) ? "selected": "" }} value="{{$user->id}}">{{$user->nom}} {{$user->prenom}}</option>
                            {{-- $demande_user->user_id== --}}
                            @endforeach 
                         
                           </select>
                          @error('user_id')
                          <small class="text-danger">{{$message}}</small>
                          @enderror
                        </div>
                      
                        
                        <div class="form-group form-actions">
                          <a href="{{ route('stageencours') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                          <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button> 
                       
                        </div>
                        
                     </form>
                    </div>


                   <span class="material-icons">
                    </span>
                   
 
</x-master-layout>