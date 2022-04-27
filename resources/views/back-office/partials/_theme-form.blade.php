@csrf
            

<div class="form-group">
  <label for="libelle">Libellé</label>
  <input type="text" id="libelle" value="{{$themes->libelle}}" name="libelle" class="form-control" placeholder="Entrer un libelle.." required>
  
  @error('session')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="description">description</label>
  <input type="text" id="description" value="{{ old('description') ?? $themes->description}}" name="description" class="form-control" placeholder="Entrer une description..">
  
  
</div>




<div class="form-group form-actions">
  <a href="{{ route('themes.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
  <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>
</div>