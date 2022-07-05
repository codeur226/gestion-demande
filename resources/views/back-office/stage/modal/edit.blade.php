
    <div class="modal fade text-left" id="ModalEdit{{$demande->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{  __('Etes-vous sur de vouloir mettre fin a ce stage ?') }}</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('stagefini') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="form-group" >
                        <input type="hidden" id="iddemande" value="{{ old('demande') ?? $demande->id}}" name="iddemande" class="form-control">
                        <label for="motif">Commentaire sur le stagiaire</label>
                        <textarea id="motif" name="motif" class="form-control" required> </textarea>
                      </div>
                      <div class="form-group form-actions">
                        <a class="btn btn-primary btn-lg mr-2" data-dismiss="modal"><i class="fa fa-arrow-circle-o-left"></i>Retour</a>
                        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-check-square"></i> Valider</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>