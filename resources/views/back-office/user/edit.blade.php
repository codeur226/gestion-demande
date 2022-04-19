<x-guest-layout>
                <x-auth-card>
                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </x-slot>
            
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
                                    <select class="form-control form-control2" name="direction" id="direction">
                                        @foreach($directions as $direction)
                                            <option value="{{$direction->id}}">{{$direction->libelle_long}}</option>
                                        @endforeach 
                                    
                                    </select>
                                    {{-- <span class="help-block">Saisir le profil</span> --}}
                                    @error('direction')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                
                                </div>
        
                      
            
                        <div class="flex items-center justify-end mt-4">
                           <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Avez vous déjà un compte?') }}
                            </a>-->
            
                            <x-button class="ml-4">
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    </form>
                </x-auth-card>
            </x-guest-layout>