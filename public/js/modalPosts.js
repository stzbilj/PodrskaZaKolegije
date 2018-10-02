$(document).ready(function() {
    /**
     * for showing edit item popup
     */
  
    $(document).on('click', "#edit-item", function() {
      $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        'backdrop': 'static'
      };
      $('#edit-modal').modal(options)
    })
  
    // on modal show
    $('#edit-modal').on('show.bs.modal', function() {
      var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
 
      // get the data
      var title = el.data('title');
      var note = el.data('note');
      var action = el.data('action');
  
      // fill the data in the input fields
      $("#modal-title").val(title);
      $("#modal-note").val(note);
      $('#edit-form').attr('action', action);
  
    })
  
    // on modal hide
    $('#edit-modal').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#edit-form").trigger("reset");
    })
  })