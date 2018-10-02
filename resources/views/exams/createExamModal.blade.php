<div class="modal fade" id="create-exam-modal" tabindex="-1" role="dialog" aria-labelledby="create-exam-modal-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="create-exam-modal-label">Uređivanje</h4>
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
                <label for="year">Vrsta kolokvija</label>
                <div id="radiobuttons">
                </div>
              </div>
              <div class="form-group">
                <label for="examFile">Kolokvij(u .pdf formatu)</label>
                <input type="file" class="form-control-file" id="examFile" name="examFile" required>
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