@csrf
            

<div class="form-group">
  <label for="session">Session</label>
  <input type="text" id="session" value="{{ old('session') ?? $session->session}}" name="session" class="form-control" placeholder="Enter une session..">
  <span class="help-block">saisir la session</span>
  @error('session')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="description">description</label>
  <input type="text" id="description" value="{{ old('description') ?? $session->description}}" name="description" class="form-control" placeholder="Enter une description..">
  <span class="help-block">saisir la description</span>
  
</div>

<div class="form-group">
  <label for="ouverture">ouverture</label>
  <input type="date" id="ouverture" value="{{ old('ouverture') ?? $session->ouverture}}" name="ouverture" class="form-control" placeholder="Enter une ouverture..">
  <span class="help-block">saisir l'ouverture</span>
  @error('ouverture')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="fermeture">fermeture</label>
  <input type="date" id="fermeture" value="{{ old('fermeture') ?? $session->fermeture}}" name="fermeture" class="form-control" placeholder="Enter une fermeture..">
  <span class="help-block">saisir la fermeture</span>
  @error('fermeture')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>


<div class="form-group form-actions">
  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
</div>