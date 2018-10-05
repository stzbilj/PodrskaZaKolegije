<div class="modal fade" id="create-exam-modal" tabindex="-1" role="dialog" aria-labelledby="create-exam-modal-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="create-exam-modal-label">Dodavanje novog kolokvija</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form id="create-exam-form" action="" method="POST" enctype="multipart/form-data">
          @csrf
  
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="year">Akademska godina</label>
                        <input type="text" class="form-control" name="year" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="radiobuttons">Vrsta kolokvija</label>
                    <div id="radiobuttons">
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="examFile" name="examFile" required>
                        <label class="custom-file-label" for="examFile">Kolokvij(u .pdf formatu)</label>
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