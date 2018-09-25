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
      var id = el.data('postid');
      var title = el.data('title');
      var note = el.data('note');
      var action = el.data('action');
  
      // fill the data in the input fields
      $("#modal-id").val(id);
      $("#modal-title").val(title);
      $("#modal-note").val(note);
      $('#edit-form').attr('action', action);
  
    })
  
    // on modal hide
    $('#edit-modal').on('hide.bs.modal', function() {
      $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
      $("#edit-form").trigger("reset");
    })


    $(document).on('click', "#delete-item", function() {
        $(this).addClass('delete-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
    
        var options = {
          'backdrop': 'static'
        };
        $('#delete-modal').modal(options)
      })
    
      // on modal show
      $('#delete-modal').on('show.bs.modal', function() {
        var el = $(".delete-item-trigger-clicked"); // See how its usefull right here? 
   
        // get the data
        var action = el.data('action');
    
        // fill the data in the input fields
        $('#delete-form').attr('action', action);
    
      })
    
      // on modal hide
      $('#delete-modal').on('hide.bs.modal', function() {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#delete-form").trigger("reset");
      })
  })