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
            
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name -->
                        <div class="mt-1">
                            <x-label for="Nom" :value="__('Nom')" />
            
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                           <!-- Prenom -->
                           <div class="mt-1">
                            <x-label for="prenom" :value="__('Prénom (s)')" />
            
                            <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
                        </div>
                          <!-- Telephone -->
                          <div class="mt-1">
                            <x-label for="telephone" :value="__('Numéro de téléphone')" />
            
                            <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" required autofocus />
                        </div>
            
                        <!-- Email Address -->
                        <div class="mt-1">
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
                        <style>
                            
                        </style>

                        <!-- Direction -->
                        <div class="mt-1">
                            <x-label for="direction" :value="__('Direction')" />
                                    <select style="width:300px;border-color:lightgray;
                                    border-radius: 5px;" class="form-control form-control2" name="direction" id="direction">
                                        @foreach($directions as $direction)
                                            <option value="{{$direction->id}}">{{$direction->libelle_long}}</option>
                                        @endforeach 
                                    
                                    </select>
                                    {{-- <span class="help-block">Saisir le profil</span> --}}
                                    @error('direction')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                
                                </div>

                                <div class="mt-1">
                                    <x-label for="role" :value="__('Role')" />
                                            <select style="width:300px;border-color:lightgray;
                                            border-radius: 5px;" class="form-control form-control2" name="role" id="role">
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->nom}}</option>
                                                @endforeach 
                                            
                                            </select>
                                            {{-- <span class="help-block">Saisir le profil</span> --}}
                                            @error('role')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        
                                        </div>
            
                        <!-- Password -->
                        <div class="mt-1">
                            <x-label for="password" :value="__('Mot de passe')" />
            
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                        </div>
            
                        <!-- Confirm Password -->
                        <div class="mt-1">
                            <x-label for="password_confirmation" :value="__('Confirmez votre mot de passe')" />
            
                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required />
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