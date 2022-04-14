<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label" for="nom">libellé de la permission<span class="text-danger">*</span></label>
  <div class="col-md-6">
      <div class="input-group">
              <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom')?? $permission->nom }}" required autofocus>
          <span class="input-group-addon"><i class="gi gi-user"></i></span>
      </div>
      @if ($errors->has('nom'))
      <span class="help-block">
          <strong>{{ $errors->first('nom') }}</strong>
      </span>
      @endif
  </div>
</div>
<div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
      <label class="col-md-4 control-label">Module<span class="text-danger">*</span></label>
<div class="col-md-6">
  <select name="pour" id="pour" class="form-control">
          <option selected disabled>Selectionne permission Pour</option>
          <option value="systeme">Système</option>
          <option value="metier">Metier</option>
  </select> a gerer
</div>
</div>

<div class="form-group form-actions">
  <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-lg btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
  <a href="{{ route('permissions.index') }}" class="btn btn-danger btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i>retour</a> 


</div>
