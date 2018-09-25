<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="myModalLabel">Potvrda brisanja</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form id="delete-form" action="" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-body">
              <p class="text-center">
                Jeste li sigurni da želite pobrisati obavijest?
              </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Odustani</button>
                <button type="submit" class="btn btn-danger">Pobriši</button>
            </div>
        </form>
      </div>
    </div>
</div>