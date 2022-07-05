@csrf           

<div class="form-group" >
  <input type="hidden" id="iddemande" value="{{ old('demande') ?? $demande->id}}" name="iddemande" class="form-control">
</div>

<div class="form-group" >
  <label for="note">Note du stagiaire /20</label>
  <input value="{{ old('demande') ?? $demande->note_globale}}" type="number" id="note" name="note"  class="form-control" placeholder="Enter une note" min="0" max="20" required>
  @error('note')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group" >
  <label for="comment">Commentaire sur le stagiaire</label>
  <textarea id="comment" name="comment" class="form-control" placeholder="Commentaire sur le stagiaire"> {{ old('demande') ?? $demande->commentaires}} </textarea>
  @error('comment')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group form-actions">
  <a href="{{ route('voirStage', $demande->id) }}" class="btn btn-primary btn-lg mr-2" > <i class="fa fa-arrow-circle-o-left"></i>Retour</a>
  <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>
</div>