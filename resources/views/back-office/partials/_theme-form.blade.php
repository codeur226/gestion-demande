@csrf
            

<div class="form-group">
  <label for="libelle">Libellé</label>
  <input type="text" id="libelle" value="{{$themes->libelle}}" name="libelle" class="form-control" >
  
  @error('session')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="description">description</label>
  <input type="text" id="description" value="{{ old('description') ?? $themes->description}}" name="description" class="form-control" placeholder="Enter une description..">
  
  
</div>




<div class="form-group form-actions">
  <button type="submit" class="btn btn-sm btn-primary center"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-sm btn-warning center"><i class="fa fa-repeat"></i> Supprimer</button>
</div>