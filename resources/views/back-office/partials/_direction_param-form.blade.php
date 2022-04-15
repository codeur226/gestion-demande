@csrf
            

<div class="form-group">
  <label for="direction">libellé court</label>
  <input type="text" id="libelle_court" value="{{ old('libelle_court') ?? $direction->libelle_court}}" name="libelle_court" class="form-control" placeholder="Enter un libellé court..">
  <label for="direction">Libellé long</label>
  <input type="text" id="libelle_long" value="{{ old('libelle_long') ?? $direction->libelle_long}}" name="libelle_long" class="form-control" placeholder="Enter un libellé long..">
  <!--<span class="help-block">saisir la direction</span>-->
  @error('direction')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>
<div class="form-group form-actions">
  <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-lg btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
</div>