
    <div class="modal fade text-left" id="ModalDownload{{$demande->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{  __('Téléverser un fichier') }}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('download') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="form-group" >
                        <input type="hidden" id="iddemande" value="{{ old('demande') ?? $demande->id}}" name="iddemande" class="form-control">

                        <label for="libelle">Intitulé du document</label>
                        <input id="libelle" name="libelle" class="form-control" placeholder="Entrer le nom du fichier" required>

                        <label  for="cv">Joindre votre fichier</label>
                        <input type="file" name="piece"  id="piece"class="form-control form-control2" accept=".pdf, .doc, .docx" required > 
                      </div>
                      <div class="form-group form-actions">
                        <a class="btn btn-primary btn-lg mr-2" data-dismiss="modal"><i class="fa fa-arrow-circle-o-left"></i>Retour</a>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Enregistrer</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>