@csrf
            

<div class="form-group">
  <label for="parametre">Paramètre</label>
  <input type="text" id="parametre" value="{{ old('parametre') ?? $parametre->parametre}}" name="parametre" class="form-control" placeholder="Enter un paramètre..">
  <span class="help-block">saisir le paramètre</span>
  @error('parametre')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>
<div class="form-group form-actions">
  <a href="{{ route('parametres.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
  <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>
</div>