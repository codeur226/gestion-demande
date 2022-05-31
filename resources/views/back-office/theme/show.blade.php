<x-master-layout>

    <!-- Main Container -->
    <div id="main-container">
       @include('back-office/partials.header1')
   
       <!-- Page content -->
       <div id="page-content">
           <h1 class="text-center">Detail d'un thème</h1>

                    <!-- Datatables Content -->

                    <div class="block full">
                      <div class="block-title">
                          {{--<h2>Tous les thémes</h2>--}}
                      </div>

                      <div class="table-responsive">
                          <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                              <thead>
                                  <tr>
                                      <th>libelle</th>
                                      <th>description</th> 
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                  <tr>
                                     
                                      <td>{{$theme->libelle}}</td>
                                      <td>{{$theme->description}}</td>
                                  </tr>
                                  
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <!-- END Datatables Content -->

                  <h1 class="text-center">Liste des stagiaires ({{$nbrDemandes}})</h1>

                  <div class="block full">
                    <div class="block-title">
                        {{--<h2>Tous les thémes</h2>--}}
                    </div>

                    <div class="table-responsive">
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom & Prenom(s)</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $number=0; ?>
                                   
                                    @foreach ($demandes as $demande)
                                    <?php $number++; ?>
                                <tr>
                                    <td>{{$number}}</td>
                                    <td>{{$demande->nom.' '.$demande->prenom}}</td>
                                    <td>{{$demande->telephone}}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <a href="{{ route('themes.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
                    </div>
                </div>
                <!-- END Datatables Content -->

                  
                  

</x-master-layout>