@csrf
            

<div class="form-group">
  <label for="parametre">Paramètre</label>
  <input type="text" id="parametre" value="{{ old('parametre') ?? $parametre->parametre}}" name="parametre" class="form-control" placeholder="Enter un parametre..">
  <span class="help-block">saisir le paramètre</span>
  @error('parametre')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>
<div class="form-group form-actions">
  <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-lg btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
</div>