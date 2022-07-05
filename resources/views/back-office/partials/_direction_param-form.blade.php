@csrf
            

<div class="form-group">
  <label for="direction">libellé court</label>
  <input type="text" id="libelle_court" value="{{ old('libelle_court') ?? $direction->libelle_court}}" name="libelle_court" class="form-control" placeholder="Enter un libellé court.." required>
  <label for="direction">Libellé long</label>
  <input type="text" id="libelle_long" value="{{ old('libelle_long') ?? $direction->libelle_long}}" name="libelle_long" class="form-control" placeholder="Enter un libellé long.." required>
  <label for="direction">Domaine</label>
  <input type="text" id="domaine" value="{{ old('domaine') ?? $direction->domaine}}" name="domaine" class="form-control" placeholder="Enter un domaine.." required>
  <!--<span class="help-block">saisir la direction</span>-->
  @error('direction')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>
<div class="form-group form-actions">
  <a href="{{ route('directions.index') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
  <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>
</div>