<x-master-layout  title=" | Demandes">

        <!-- Main Container -->
        <div id="main-container">
         @include('back-office/partials.header1')

        <div class="block">

            @if(session()->has('message'))
            <div class="alert alert-success">
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

         <!-- Page content -->
         <div id="page-content">


                      <!-- Datatables Content -->
                      {{-- <a class="btn btn-success btn-sm" href="{{route('demandes.create')}}"><i class="fas fa-plus"></i>Nouveau</a> --}}
                      <div class="block full">
                        <div class="block-title">
                            <h2>Liste des demandes ({{ $stageattente }})</h2>
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Code</th>
                                        <th>Nom</th>
                                        <th>Prénom (s)</th>
                                        <th>E-mail</th>
                                        <th>Domaine</th>
                                        <th>Date debut</th>
                                        <th>Date fin</th>
                                        <th>Etat</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <?php $number=0; ?>

                                    @foreach ($demandes as $demande)
                                    <?php $number++; ?>
                                        <td class="text-center"> {{$number}}</td>
                                        <td>{{$demande->code}}</td>
                                        <td>{{$demande->nom}}</td>
                                        <td>{{$demande->prenom}}</td>
                                        <td>{{$demande->email}}</td>
                                        <td>{{$demande->domaine}}</td>
                                        <td>{{$demande->date_debut}}</td>
                                        <td>{{$demande->date_fin}}</td>
                                        <td>{{getValeur($demande->etat)}}</td>
                                         <td class="text-center">
                                            <div class="btn-group">

                                                <a title="Voir les détails" href="{{ route('demandes.show', $demande->id) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                                {{-- <a href="{{ route('demandes.edit', $demande) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a> --}}
                                                <a title="Supprimer la demande" href="{{ route("demandes.destroy", $demande->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                    event.preventDefault();
                                                    if(confirm('Etes-vous sur de vouloir supprimer cette demande ?'))
                                                    document.getElementById('{{ $demande->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                                <form id="{{ $demande->id }}" method="post" action="{{ route("demandes.destroy", $demande->id) }}">
                                                    @csrf
                                                    @method("delete")
                                                </form>

                                                {{--<a href="#" class="btn btn-danger btn-sm"  onClick=" event.preventDefault();suppressionConfirm('{{ $param->id }}')" ><i class="fa fa-trash-o fa-lg"></i></a>--}}
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Datatables Content -->




            </div>
        </div>
</x-master-layout>
