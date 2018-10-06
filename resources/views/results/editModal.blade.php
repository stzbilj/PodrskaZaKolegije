<div class="modal fade" id="edit-result-modal" tabindex="-1" role="dialog" aria-labelledby="edit-result-modal-label">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="edit-result-modal-label">Uređivanje rezultata</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="edit-result-form" action="" method="POST" enctype="multipart/form-data">
                @method('PATCH')        
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for=>Vrsta kolokvija</label>
                        <div id="radiobuttons">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="resultsFile" name="resultsFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                            <label class="custom-file-label" for="resultsFile">Rezultati (u .csv formatu)</label>
                        </div>
                        <div>
                            Unosom nove datoteke stari podaci će se prebrisati!
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note">Dodatni komentar</label>
                        <textarea id="modal-note" class="form-control" rows="3" name="note"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                  <button type="submit" class="btn btn-primary">Spremi</button>
                </div>
            </form>
          </div>
        </div>
      </div>