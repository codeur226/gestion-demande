@csrf

<div class="form-group">
  <label for="parametre_id">Paramètre</label>
  <select class="form-control" name="parametre_id" id="parametre_id">
    @foreach($parametres as $parametre)
    
    <option {{ ($valeur->parametre_id==$parametre->id OR old('parametre_id')==$parametre->id) ? "selected": "" }} value="{{$parametre->id}}">{{$parametre->parametre}}</option>
        
    @endforeach 
 
   </select>
  <span class="help-block"></span>
  @error('parametre_id')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="valeur">Valeur</label>
  <input value="{{ old('valeur') ?? $valeur->valeur}}" type="text" name="valeur" id="valeur" class="form-control" placeholder="Entrer une valeur" aria-describedby="helpId" required>
  <span class="help-block"></span>
  @error('valeur')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group form-actions">
  <a href="{{ route('valeurs.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
  <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>
</div>


