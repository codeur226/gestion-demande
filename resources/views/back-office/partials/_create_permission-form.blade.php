<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label" for="nom">libellé de la permission<span class="text-danger">*</span></label>
  <div class="col-md-6">
      <div class="input-group">
              <input id="nom" type="text" name="nom" class="form-control" placeholder="Entrer une permission..">
          <span class="input-group-addon"><i class=""></i></span>
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
  <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
  <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>


</div>
