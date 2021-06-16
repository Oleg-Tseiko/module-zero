/**
 * @file
 * Global utilities.
 *
 */
(function($, Drupal) {

  'use strict';

  Drupal.behaviors.exam = {
    attach: function(context, settings) {
      $(".ui-dialog-titlebar-close").text("×");
      // Custom code here

    }
  };

})(jQuery, Drupal);
