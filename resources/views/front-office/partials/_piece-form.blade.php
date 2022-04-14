@csrf
          
<div class="form-group">
  <label for="nom">ID DEMANDE</label>
  <input type="text" id="demande_id" value="{{ old('liste') ?? $liste->id}}" name="demande_id" class="form-control" readonly>
  <!--<span class="help-block">saisir le paramètre</span>-->
  @error('demande_id')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="libelle">LIBELLE</label>
  <input type="text" id="libelle" value="{{ old('liste') ?? $liste->libelle}}" name="libelle" class="form-control" placeholder="Saisir le libelle du fichier">
  <!--<span class="help-block">saisir le paramètre</span>-->
  @error('libelle')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="description">DESCRIPTION</label>
  <input type="text" id="description" value="{{ old('liste') ?? $liste->description}}" name="description" class="form-control" placeholder="Saisir la description du fichier">
  <!--<span class="help-block">saisir le paramètre</span>-->
  @error('description')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>


<div class="form-group">
  <label for="file">MODIFIER LE FICHIER</label>
  <input type="file" id="file" name="file" class="form-control" required="required" accept=".pdf">
  <!--<span class="help-block">saisir le paramètre</span>-->
  @error('file')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>


<div class="form-group form-actions">
  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
</div>