@csrf
          

<div class="form-group">
 
  <input type="hidden" id="demande_id" value="{{ old('liste') ?? $liste->id}}" name="demande_id" class="form-control" >
  </div>
<div class="form-group">
  <label for="date_debut">DATE DEBUT</label>
  <input type="date" id="date_debut" value="{{ old('liste') ?? $liste->date_debut}}" name="date_debut" class="form-control" placeholder="saisir la date de début">
  <!--<span class="help-block">saisir le paramètre</span>-->
  @error('date_debut')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>
<div class="form-group">
  <label for="date_fin">DATE FIN</label>
  <input type="date" id="date_fin" value="{{ old('liste') ?? $liste->date_fin}}" name="date_fin" class="form-control" placeholder="saisir la date de fin">
  <!--<span class="help-block">saisir le paramètre</span>-->
  @error('date_fin')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>
<div class="form-group form-actions">
  <a href="{{ route('stagevalides') }}" class="btn btn-primary btn-lg mr-2" ><i class="fa fa-arrow-circle-o-left"></i> Retour</a>
  <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>
</div>