<?php

namespace Drupal\anzy\Form;

use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Url;

/**
 * Contains \Drupal\anzy\Form\CatForm.
 *
 * @file
 */

/**
 * Provides an Cat form.
 */
class CatChangeForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cat_change_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['edit'] = [
      '#type' => 'submit',
      '#value' => t('Edit'),
      '#ajax' => [
        'callback' => '::ajaxForm',
        'event' => 'click',
        'progress' => [
          'type' => 'throbber',
        ],
      ],
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage($this->t('Entry edit successfully'), 'status', TRUE);
  }

  /**
   * Function to reload page.
   */
  public function ajaxForm(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $currentURL = Url::fromRoute('<current>');
    $response->addCommand(new RedirectCommand($currentURL->toString()));
    return $response;
  }

}
