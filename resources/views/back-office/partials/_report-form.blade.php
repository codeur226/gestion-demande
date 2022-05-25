@csrf
            

<div class="form-group">
  <input type="hidden" id="iddemande" name="iddemande" value="{{ $demande->id }}">

  <label for="datedebut">Date début</label>
  <input type="date" id="datedebut" name="datedebut" class="form-control" placeholder="Enter la date de début">
  
  @error('datedebut')
  <small class="text-danger">{{$message}}</small>
  @enderror



  <label for="datedefin">Date fin</label>
  <input type="date" id="datedefin" name="datedefin" class="form-control" placeholder="Enter la date de fin">
  
  @error('datedefin')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>


<label for="textarea">Motif de report</label>

<textarea id="motif" name="motif" class="form-control" placeholder="Saisir le motif"> </textarea>

@error('textarea')
<small class="text-danger">{{$message}}</small>
@enderror
</div>



<div class="form-group form-actions">
  <a href="{{ route('demandes.show', $demande->id) }}" class="btn btn-primary btn-lg mr-2" > <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Retour</a>
  <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>
  
</div>