$(document).ready(function() {
    /**
     * for showing edit item popup
     */
  
    $(document).on('click', "#create-exam", function() {
      $(this).addClass('create-exam-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        'backdrop': 'static'
      };
      $('#create-exam-modal').modal(options)
    })
  
    // on modal show
    $('#create-exam-modal').on('show.bs.modal', function() {
      var el = $(".create-exam-trigger-clicked"); // See how its usefull right here? 
 
      // get the data
      var types = el.data('types');
      var action = el.data('action');
  
      // fill the data in the input fields
      $('#create-exam-form').attr('action', action);
      var first = true;
      types.forEach(element => {
        var radioBtn = '<div class="form-check form-check-inline radios">'  
                      + '<input class="form-check-input" type="radio" name="exam_id" id="inlineRadio' + element.id + '" value="' + element.id + '"';
        if ( first ){ 
            radioBtn += ' checked';
            first = false;
        }               
        radioBtn += '>'
                      + '<label class="form-check-label" for="inlineRadio' + element.id + '">' + element.name + '</label>'
                      + '</div>';
        $(radioBtn).appendTo('#radiobuttons');
      });
        
    })
  
    // on modal hide
    $('#create-exam-modal').on('hide.bs.modal', function() {
      $('.create-exam-trigger-clicked').removeClass('create-exam-trigger-clicked')
      $('div').remove('.radios');
      $("#create-exam-form").trigger("reset");
    })



    $(document).on('click', "#create-assignment", function() {
      $(this).addClass('create-assignment-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.
  
      var options = {
        'backdrop': 'static'
      };
      $('#create-assignment-modal').modal(options)
    })
  
    // on modal show
    $('#create-assignment-modal').on('show.bs.modal', function() {
      var el = $(".create-assignment-trigger-clicked"); // See how its usefull right here? 
 
      // get the data
      var action = el.data('action');
  
      // fill the data in the input fields
      $('#create-assignment-form').attr('action', action);
  
    })
  
    // on modal hide
    $('#create-assignment-modal').on('hide.bs.modal', function() {
      $('.create-assignment-trigger-clicked').removeClass('create-assignment-trigger-clicked')
      $("#create-assignment-form").trigger("reset");
    })
  })