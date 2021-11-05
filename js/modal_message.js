(function ($, Drupal, drupalSettings) {

  'use strict';

  Drupal.behaviors.plugin_messages_modal_message_js = {
    attach: function (context, settings) {
      const closeModal = function (dialog) {
        const timestamp = Math.floor(Date.now() / 1000);
        const dontShow = $('#dnsa').is(":checked");
        localStorage.setItem('upct', timestamp)
        localStorage.setItem('upcd', dontShow)
        $(dialog).dialog('close');
      }
      const unauthorizedModal = Drupal.dialog('<div>' + drupalSettings.plugin_messages.message + ' <br> <input type="checkbox" id="dnsa" style="float: left"><label for="dnsa">Don\'t show again</label></div>', {
        title: drupalSettings.plugin_messages.title,
        dialogClass: 'front-modal',
        width: 500,
        autoResize: true,
        close: function (event) {
          closeModal(this)
          $(event.target).remove();
        },
        buttons: [
          {
            text: 'Close the window',
            icons: {
              primary: 'ui-icon-close'
            },
            click: function () {
              closeModal(this)
            }
          }
        ]
      });
      const closedTime = localStorage.getItem('upct')
      const closedTimeInt = parseInt(closedTime)
      const dontShow = localStorage.getItem('upcd') === 'true'
      const dontShowConfig = parseInt(drupalSettings.plugin_messages.time)
      const pause = drupalSettings.plugin_messages.unit === 'hours' ? 60 * 60 * dontShowConfig : 60 * 60 * 24 * dontShowConfig
      const timestamp = Math.floor(Date.now() / 1000);
      const nextShowTime = closedTimeInt + pause;
      if ((closedTime === null || (nextShowTime <= timestamp)) && !dontShow) {
        unauthorizedModal.showModal();
      }
    }
  }

}(jQuery, Drupal, drupalSettings));
