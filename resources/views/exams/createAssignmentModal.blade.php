<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="edit-modal-label">Uređivanje</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form id="edit-form" action="" method="POST">
          @method('PATCH')
          @csrf
  
            <div class="modal-body">
                    <input type="hidden" name="id" id="modal-id" value="" required>
              <div class="form-group row">
                <div class="col-sm-12">
                    <input id="modal-title" type="text" class="form-control" name="title" placeholder="Ovdje upišite naslov" required>
                </div>
              </div>
              <div class="form-group">
                  <textarea id="modal-note" class="form-control" rows="5" name="note" placeholder="Ovdje upišite tekst obavijesti" required></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
              <button type="submit" class="btn btn-primary">Spremi</button>
            </div>
        </form>
      </div>
    </div>
  </div>