<x-master-layout  title=" | Liste des utilisateurs">

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
                      <a class="btn btn-success btn-sm" href="{{route('register.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un utilisateur</a>
                     
                      {{-- <a class="btn btn-success btn-sm" href="{{route('register.create')}}"><i class="fas fa-plus"></i>Nouveau</a> --}}
                      <div class="block full">
                        <div class="block-title">
                            <h2>Liste des utilisateurs</h2>
                        </div>

                        <div class="table-responsive">
                            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Nom</th>
                                        <th>Prénom (s)</th>
                                        <th>E-mail</th>
                                        <th>Télephone</th>
                                        <th>Chef Dep./Directeur</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <?php $number=0; ?>
                                   
                                    @foreach ($users as $user)
                                    <?php $number++; ?>
                                        <td class="text-center"> {{$number}}</td>
                                        <td>{{$user->nom}}</td>
                                        <td>{{$user->prenom}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->telephone}}</td>
                                        <td class="col-md-1">
                                            <label class="switch switch-primary "><input type="checkbox" onclick="idstatus({{ $user->id }})"
                                                       @if($user->estResponsable == true)
                                                          checked 
                                                      @endif
                                                      value="true"><span></span></label>
                                              </td>
                                         <td class="text-center">
                                            <div class="btn-group">
                                               
                                                <a href="{{ route('register.show', $user) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-eye fa-lg"></i></a>
                                                <a href="{{ route('register.edit', $user) }}" class="btn btn-primary btn-sm mr-2" ><i class="fa fa-pencil fa-lg"></i></a>
                                                <a href="{{ route('register.destroy', $user->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                    event.preventDefault(); 
                                                    if(confirm('Etes-vous sur de vouloir supprimer cet utilisateur ?')) 
                                                    document.getElementById('{{ $user->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                                <form id="{{ $user->id }}" method="post" action="{{ route('register.destroy', $user->id) }}">
                                                    @csrf
                                                    @method("delete")
                                                </form>

                                                {{--<a href="#" class="btn btn-danger btn-sm"  onClick=" event.preventDefault();suppressionConfirm('{{ $user->id }}')" ><i class="fa fa-trash-o fa-lg"></i></a>--}}  
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

        <script>

function idstatus (id){
            var id= id;
            url= "{{ route('user.updateStatus') }}";         
            $.ajax({
                url: url,
                type:'GET',
                data: {id: id} ,
                error:function(){alert('error');},
                success:function(){
                }

           });
        }
        </script>
</x-master-layout>