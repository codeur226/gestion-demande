@csrf

<div class="form-group">
  <label for="parametre_id">Paramètre</label>
  <select class="form-control" name="parametre_id" id="parametre_id">
    @foreach($parametres as $parametre)
    
    <option {{ ($valeur->parametre_id==$parametre->id OR old('parametre_id')==$parametre->id) ? "selected": "" }} value="{{$parametre->id}}">{{$parametre->parametre}}</option>
        
    @endforeach 
 
   </select>
  <span class="help-block">saisir le paramètre</span>
  @error('parametre_id')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="valeur">Valeur</label>
  <input value="{{ old('valeur') ?? $valeur->valeur}}" type="text" name="valeur" id="valeur" class="form-control" placeholder="" aria-describedby="helpId">
  <span class="help-block">saisir la valeur</span>
  @error('valeur')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group form-actions">
  <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-lg btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
</div>

