$(document).ready(function() {
    /**
     * for showing edit item popup
     */
  
    $(document).on('click', "#edit-result", function() {
      $(this).addClass('edit-result-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        'backdrop': 'static'
      };
      $('#edit-result-modal').modal(options)
    })
  
    // on modal show
    $('#edit-result-modal').on('show.bs.modal', function() {
      var el = $(".edit-result-trigger-clicked"); // See how its usefull right here? 
 
      // get the data
      var types = el.data('types');
      var type_id = el.data('type-id');
      var comment = el.data('note');
      var action = el.data('action');
      
      // fill the data in the input fields
      $('#modal-note').val(comment);
      $('#edit-result-form').attr('action', action);

      types.forEach(element => {
        var radioBtn = '<div class="form-check form-check-inline radios">'  
                      + '<input class="form-check-input" type="radio" name="exam_id" id="inlineRadio' + element.id + '" value="' + element.id + '"';
        if ( element.id === type_id ){ 
            radioBtn += ' checked';
        }               
        radioBtn += '>'
                      + '<label class="form-check-label" for="inlineRadio' + element.id + '">' + element.name + '</label>'
                      + '</div>';
        $(radioBtn).appendTo('#radiobuttons');
      });
        
    })
  
    // on modal hide
    $('#edit-result-modal').on('hide.bs.modal', function() {
      $('.edit-result-trigger-clicked').removeClass('edit-result-trigger-clicked')
      $('div').remove('.radios');
      $("#edit-result-form").trigger("reset");
    })

  })