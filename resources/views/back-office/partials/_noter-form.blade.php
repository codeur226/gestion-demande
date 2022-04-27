@csrf           

<div class="form-group" >
  <input type="hidden" id="iddemande" name="iddemande" value="{{ $demande->id }}">
  <label for="note">Note du stagiaire /20</label>
  <input type="number" id="note" name="note" class="form-control" placeholder="Enter une note" min="0" max="20" required>
  
  @error('datedefin')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>
<div class="form-group" >
<label for="textarea">Commentaire sur le stagiaire</label>
<textarea id="comment" name="comment" class="form-control" placeholder="Commentaire sur le stagiaire"> </textarea>

@error('textarea')
<small class="text-danger">{{$message}}</small>
@enderror
</div>
<div class="form-group form-actions">
  <button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-lg btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
  <a href="{{ route('voirStage', $demande->id) }}" class="btn btn-primary btn-lg mr-2" > <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>Retour</a>
</div>