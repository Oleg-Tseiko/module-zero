<?php

namespace Drupal\anzy\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Anzy module.
 */
class AnzyController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function catsPage() {
    return [
      '#markup' => '<h2>Hello! You can add here a photo of your cat.</h2>',
    ];
  }

}
