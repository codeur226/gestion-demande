@csrf
            



<div class="form-group">
  <label for="profil_id">Profil</label>
  <select class="form-control" name="idtypeprofil" id="idtypeprofil">
    @foreach($profils as $prof)
    
    <option {{ ($param_session_profil_region->id_profil==$prof->id OR old('idtypeprofil')==$prof->id) ? "selected": "" }} value="{{$prof->id}}">{{$prof->valeur}}</option>
        
    @endforeach 
 
   </select>
  {{-- <span class="help-block">Saisir le profil</span> --}}
  @error('idtypeprofil')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>


<div class="form-group">
  <label for="region_id">Region</label>
  <select class="form-control" name="idregion" id="idregion">
    @foreach($regions as $reg)
    
    <option {{ ($param_session_profil_region->id_region==$reg->id OR old('idregion')==$reg->id) ? "selected": "" }} value="{{$reg->id}}">{{$reg->valeur}}</option>
        
    @endforeach 
 
   </select>
  {{-- <span class="help-block">Saisir le profil</span> --}}
  @error('idregion')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="poste_a_pourvoir">Poste à pourvoir</label>
  <input type="text" id="poste_a_pourvoir" value="{{ old('poste_a_pourvoir') ?? $param_session_profil_region->poste_a_pourvoir}}" name="poste_a_pourvoir" class="form-control" placeholder="Enter un poste..">
  <span class="help-block">saisir le poste à pourvoir</span>
  @error('poste_a_pourvoir')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>


<div class="form-group">
  <label for="quota">Quota</label>
  <input type="text" id="quota" value="{{ old('quota') ?? $param_session_profil_region->quota}}" name="quota" class="form-control" placeholder="Enter un quota..">
  <span class="help-block">saisir le Quota</span>
  @error('quota')
  <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<select class="form-control" name="idsession" id="idsession" type="hidden">
  @foreach($sessions as $session)
  
  <option {{ ($param_session_profil_region->idsession==$session->id OR old('idsession')==$session->id) ? "selected": "" }} value="{{$session->id}}">{{$session->session}}</option>
      
  @endforeach 

 </select>
@error('idsession')
<small class="text-danger">{{$message}}</small>
@enderror



<div class="form-group form-actions">
  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Valider</button>
  <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Initialiser</button>
</div>


<script>
  var earrings = document.getElementById('idsession');
   earrings.style.visibility = 'hidden';
</script>