<?php

namespace Drupal\anzy\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @file
 * Contains \Drupal\anzy\Form\CatForm.
 */

/**
 * Provides an Cat email form.
 */
class CatForm extends FormBase {
  /**
   * (@inheritdoc)
   */

  public function getFormId() {
    return 'cat_email_form';
  }

  /**
   * (@inheritdoc)
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $node = \Drupal::routeMatch()->getParameter('node');
    $form['email'] = array(
      '#title' => t("Your cat's name:"),
      '#type' => 'textfield',
      '#size' => 25,
      '#description' => t("Name should be at least 2 characters and less than 32 characters"),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Add cat'),
    );
    return $form;
  }

  /**
   * (@inheritdoc)
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage(t("The form is working."));
  }

}
