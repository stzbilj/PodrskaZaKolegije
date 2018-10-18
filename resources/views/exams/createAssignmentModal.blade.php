<div class="modal fade" id="create-assignment-modal" tabindex="-1" role="dialog" aria-labelledby="create-assignment-modal-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="create-assignment-modal-label">Dodavanje novog zadatka</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form id="create-assignment-form" action="" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-sm-12">
                    <label for="text_link">Tekst poveznice</label>
                    <input type="text" class="form-control" name="text_link" required>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="assignmentFile" name="assignmentFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])"required>
                    <label class="custom-file-label" for="assignmentFile">Zadatak(u .pdf formatu)</label>
                </div>
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="additional" name="additional" value="true">
                  <label class="custom-control-label" for="additional">Dodatni zadatak</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
              <button type="submit" class="btn btn-primary">Dodaj</button>
            </div>
        </form>
      </div>
    </div>
  </div>