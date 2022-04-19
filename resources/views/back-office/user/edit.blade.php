<x-guest-layout>
                <x-auth-card>
                    <x-slot name="logo">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </x-slot>
            
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
            
                        <!-- Name -->
                        <div>
                            <x-label for="Nom" :value="__('Nom')" />
            
                            <x-input value="{{old('name') ?? $users->nom}}" type="text" name="name" id="name" class="block mt-1 w-full"  required autofocus/>
                            </div>
                           <!-- Prenom -->
                           <div>
                            <x-label for="prenom" :value="__('Prénom (s)')" />
            
                            <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                        </div>
                          <!-- Telephone -->
                          <div>
                            <x-label for="telephone" :value="__('Numéro de téléphone')" />
            
                            <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autofocus />
                        </div>
            
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
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
            
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Mot de passe')" />
            
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>
            
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirmez votez mot de passe')" />
            
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Avez vous déjà un compte?') }}
                            </a>
            
                            <x-button class="ml-4">
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    </form>
                </x-auth-card>
            </x-guest-layout>