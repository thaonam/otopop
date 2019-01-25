/**
 * Script to handle admin pages for Otopop.
 */
(function ($) {
  Drupal.behaviors.otopop_admin = {
    attach: function (context, settings) {
      /*Assign the Location field to the address field before submitting*/
      if ($('#event-node-form').length) {
        $('#event-node-form #edit-submit').click(function () {
          var value_location = $('#event-node-form #edit-field-location-und-0-address-field').val();
          // console.log(value_location);
          $('#event-node-form #edit-field-address input[name="field_address[und][0][value]"]').val(value_location);

        });
        if ($('#edit-field-event-date-und-0-value').length) {
          $('#edit-field-event-date-und-0-value .form-item-field-event-date-und-0-value-date label').text('Event Start');
        }
        if ($('#edit-field-event-date-und-0-value2').length) {
          $('#edit-field-event-date-und-0-value2 .form-item-field-event-date-und-0-value2-date label').text('Event End');
        }
      }
      if ($('#open-activity-node-form').length) {
        $('#open-activity-node-form #edit-submit').click(function () {
          var value_location = $('#open-activity-node-form #edit-field-location-und-0-address-field').val();
          // console.log(value_location);
          $('#open-activity-node-form #edit-field-address input[name="field_address[und][0][value]"]').val(value_location);

        });
      }

      /*END CODE*/
    }
  };
})(jQuery);
