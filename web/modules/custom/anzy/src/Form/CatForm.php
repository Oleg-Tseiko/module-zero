<?php

namespace Drupal\anzy\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * @file
 * Contains \Drupal\anzy\Form\CatForm.
 */

/**
 * Provides an Cat form.
 */
class CatForm extends FormBase {
  /**
   * (@inheritdoc)
   */

  public function getFormId() {
    return 'cat_form';
  }

  /**
   * (@inheritdoc)
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $node = \Drupal::routeMatch()->getParameter('node');
    $form['name'] = array(
      '#title' => t("Your cat's name:"),
      '#type' => 'textfield',
      '#size' => 25,
      '#description' => t("Name should be at least 2 characters and less than 32 characters"),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Add cat'),
      '#ajax' => [
        'callback' => '::ajaxForm',
        'event' => 'click',
        'progress' => [
          'type' => 'throbber',
        ],
      ],
    );
    return $form;
  }

  /**
   * (@inheritDoc)
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('name')) < 2) {
      $form_state->setErrorByName('name', t('The name is too short. Please enter valid name.'));
    } elseif (strlen($form_state->getValue('name')) > 32) {
      $form_state->setErrorByName('name', t('The name is too long. Please enter valid name.'));
    }
  }

  /**
   * (@inheritdoc)
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage($this->t('Form Submitted Successfully'), 'status', TRUE);
  }
  public function ajaxForm(array &$form, FormStateInterface $form_state) {
    $message = \Drupal::messenger()->all();
    $messages = \Drupal::service('renderer')->render($message);
    $response = new AjaxResponse();
    $response->addCommand(new HtmlCommand('#edit-name--description', $messages));
    return $response;
  }
}
