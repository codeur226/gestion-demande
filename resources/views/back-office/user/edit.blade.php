<x-guest-layout>
                <x-auth-card>
                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </x-slot>

                    <div>
                        <a href="{{route('acceuil')}}">
                            <img class="w-20 h-30" style="margin:auto;" src="{{ asset('front-office/assets/img/ANPTIC.jpg') }}">
                        </a>
                      </div>
            
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
                    <form method="POST" action="{{ route('register.update',$user) }}">
                        @csrf
                        @method('PUT')
            
                        <!-- Name -->
                        <div>
                            <x-label for="Nom" :value="__('Nom')" />
            
                            <x-input value="{{old('name') ?? $user->nom}}" type="text" name="name" id="name" class="block mt-1 w-full"  required autofocus/>
                            </div>
                           <!-- Prenom -->
                           <div>
                            <x-label for="prenom" :value="__('Prénom (s)')" />
            
                            <x-input value="{{old('prenom') ?? $user->prenom}}" id="prenom" class="block mt-1 w-full" type="text" name="prenom" required autofocus />
                        </div>
                          <!-- Telephone -->
                          <div>
                            <x-label for="telephone" :value="__('Numéro de téléphone')" />
            
                            <x-input value="{{old('telephone') ?? $user->telephone}}" id="telephone" class="block mt-1 w-full" type="text" name="telephone" required autofocus />
                        </div>
            

                        
                        <!-- Direction -->
                        <div class="mt-4">
                            <x-label for="direction" :value="__('Direction')" />
                                    <select style="width:300px" class="form-control form-control2" name="direction" id="direction" required>
                                        @foreach($directions as $direction)
                                            <option {{ ($user->direction_id==$direction->id OR old('direction_id')==$direction->id) ? "selected": "" }} value="{{$direction->id}}">{{$direction->libelle_long}}</option>
                                        @endforeach 
                                    
                                    </select>
                                    {{-- <span class="help-block">Saisir le profil</span> --}}
                                    @error('direction')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                
                                </div>

                                <div class="mt-4">
                                    <x-label for="role" :value="__('Role')" />
                                            <select style="width:300px" class="form-control form-control2" name="role" id="role" required>
                                                @foreach($roles as $role)
                                                    <option {{ ($user->role_id==$role->id OR old('role_id')==$role->id) ? "selected": "" }} value="{{$role->id}}">{{$role->nom}}</option>
                                                @endforeach 
                                            
                                            </select>
                                            {{-- <span class="help-block">Saisir le profil</span> --}}
                                            @error('role')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        
                                        </div>
        
                      
            
                        <div class="flex items-center justify-start mt-4">
                            {{-- <x-button style="width:150px; text-align: center;
                            display:table-cell;
                            vertical-align:middle;">
                                {{ __('Retour') }}
                            </x-button> --}}
                            <a href="{{ route('listeUser') }}" class="btn btn-danger btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                            <x-button style="width:150px; text-align: center;
                            display:table-cell;
                            vertical-align:middle;" class="ml-4">
                                {{ __('Enregistrer') }}
                            </x-button>
                            
                        </div>
                    </form>
                </x-auth-card>
            </x-guest-layout>