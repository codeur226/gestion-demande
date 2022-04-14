@csrf
            

<div class="form-group">

    <label class="col-md-5 control-label" for="libellepiece">Choisir la pièce : <span class="text-danger">*</span></label>
            <div class="col-md-7">
                <div class="input-group">
                    <input type="file" name="file" class="form-control" accept=".pdf"  required title="Ce champs est obligatoire !!">
                    @error('parametre')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

</div>
<div class="form-group form-actions">
  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
</div>