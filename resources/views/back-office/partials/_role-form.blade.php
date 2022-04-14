@csrf
          

<div class="form-group">
  <label for="role">Libellé du rôle</label>
  <input type="text" id="role"  value="{{ old('role') ?? $role->nom}}" name="role" class="form-control" placeholder="Saisir le nom du role">
  <!--<span class="help-block">saisir le paramètre</span>-->
  @error('role')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>



{{-- 
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label" for="name">Libellé du rôle<span class="text-danger">*</span></label>
  <div class="col-md-6">
      <div class="input-group">
              <input id="name" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required title="Ce champs est obligatoire !!" autofocus>
              <span class="input-group-addon"><i class="gi gi-user"></i></span>
      </div>
      @if ($errors->has('nom'))
      <span class="help-block">
          <strong>{{ $errors->first('nom') }}</strong>
      </span>
      @endif
  </div>
</div> --}}
<div class="form-group">
  <label class="col-md-4 control-label"> Rôle Système <span class="text-danger">*</span></label>
<div class="col-md-8">
  <div class="input-group">

    @if ($role->typerole==1)
    
    <input type="checkbox"  class="form-control" name="typeRole" value="1" checked   >
      @else
          <input type="checkbox"  class="form-control" name="typeRole" value="0">       
    @endif
         
  </div>
</div>
</div>
<div class="row col-lg-offset-1">
      <div class="col-lg-4">
          <label><u style="font-weight: bold">Permissions système</u></label>	<br>
{{-- 
          <div class="col-lg-4">
            <label>Permission système</label>	 --}}
            @foreach ($permissions as $permission )
                @if($permission->pour== 'systeme')
                        <label><input type="checkbox" name=permissions[] value="{{ $permission->id }}"
                            @foreach ($role->permissions as $role_permit)
                                    @if ($role_permit->id==$permission->id)
                                          checked          
                                    @endif
                                @endforeach
                                > {{ $permission->nom }}</label> <br>
                            @endif
                        @endforeach
        </div>






          {{-- @foreach ($permissions as $permission )
              @if($permission->pour== 'systeme')
                      <label><input type="checkbox" name=permission[] value="{{ $permission->id }}"> {{ $permission->nom }}</label>
              @endif
              <br>
          @endforeach
      </div> --}}
      <div class="col-lg-4 ">
              <label> <u style="font-weight: bold">Permissions Métier </u></label>	<br>

              @foreach ($permissions as $permission )
              @if($permission->pour== 'metier')
                      <label><input type="checkbox" name=permissions[] value="{{ $permission->id }}"
                          @foreach ($role->permissions as $role_permit)
                                  @if ($role_permit->id==$permission->id)
                                        checked          
                                  @endif
                              @endforeach
                              > {{ $permission->nom }}</label>
                          @endif
                      @endforeach
              {{-- @foreach ($permissions as $permission )
                  @if($permission->pour== 'metier')
                      <label><input type="checkbox" name=permission[] value="{{ $permission->id }}"> {{ $permission->nom }}</label>
                  @endif
              @endforeach --}}
      </div>   
</div>

<div class="form-group form-actions">


  <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-lg btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
  <a href="{{ route('roles.index') }}" class="btn btn-danger btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i>retour</a> 

  {{-- <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Initialiser</button> --}}
</div>