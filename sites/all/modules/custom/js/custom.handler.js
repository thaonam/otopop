/**
 * Script to handle front pages for Otopop.
 */
(function ($) {
  Drupal.behaviors.otopop_custom = {
    attach: function (context, settings) {
      if ($("body:not('.processed')").length) {
        
        // Add handler for activity date field.
        if ($("#activity_date").length) {
          $("#activity_date").datepicker({
            minDate: "+1 day",
            maxData: "+1 year"
          });
        }
        
        // Add handler for activity location.
        if ($("#activity_location").length) {
          google_map_autocomplete_init('activity_location', function (google_map_autocomplete) {
            // Update when place changed.
            google_map_autocomplete.addListener('place_changed', function () {
              // Get the place details from the autocomplete object.
              var place = google_map_autocomplete.getPlace();
              
              $("#activity_location_lat").val(place.geometry.location.lat());
              $("#activity_location_lng").val(place.geometry.location.lng());
            });
          });
        }
        
        //Page Manage Event
        // Varying modal content based on trigger button
        $('#modalEvent').on('show.bs.modal', function (event) {
          console.log(event);
          var button = $(event.relatedTarget) // Button that triggered the modal
          // Extract info from data-* attributes
          var nid = button.data('nid')
          var uid = button.data('uid')
          var title = button.data('title')
          var author = button.data('author')
          var location = button.data('location')
          var price = button.data('price')
          var description = button.data('description')
          var payment = button.data('payment')
          
          // If necessary, you could initiate an AJAX request here (and then do
          // the updating in a callback). Update the modal's content. We'll use
          // jQuery here, but you could use a data binding library or other
          // methods instead.
          var modal = $(this)
          modal.find('.modal-title').text(title)
          modal.find('.modal-author span').text(author);
          modal.find('.modal-event-location span').text(location)
          modal.find('.modal-event-desc').html(description)
          modal.find('.btn-join').attr({
            'data-nid': nid,
            'data-title': title,
            'data-uid': uid
          });
          if (price == '') {
            console.log('1223423985');
            
          }
          if (price != '') {
            modal.find('.modal-price').once('modal_prices').html(' - ' + price);
            
          }
          modal.find('.btn_stop').attr({
            'data-event_id': nid
          });
          modal.find('.type').text(payment)
          modal.find('#btn-start-popup').attr({
            'data-target': "#timer-modal-" + nid
          });
        });
        
        //Modal #modalEvent show : trigle button
        if ($('#btn-start-popup').length) {
          $("#btn-start-popup").click(function () {
            $($('#btn-start-popup')[0].dataset.target).on('shown.bs.modal', function () {
              alert('The modal is fully shown.');
              $('#btn_start').trigger("click");
            });
          });
 
        }
        
        $("body").addClass('processed');
      }
    }
  };
})(jQuery);
