@csrf           

<div class="form-group">
<input type="hidden" id="iddemande" name="iddemande" value="{{ $demande->id }}">
  <label for="theme_id">Thème</label>
  <select class="form-control" name="theme_id" id="theme_id">
    @foreach($themes as $theme)
    
    <option {{ ($demande->theme_id==$theme->id OR old('theme_id')==$theme->id) ? "selected": "" }} value="{{$theme->id}}">{{$theme->libelle}}</option>
        
    @endforeach 
 
   </select>
  <span class="help-block">sélectionner le thème</span>
  @error('theme_id')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group form-actions">
  <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-check-square"></i> Valider</button>
  <a href="{{ route('voirStage', $demande->id) }}" class="btn btn-primary btn-lg mr-2" > <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Retour</a>
</div>