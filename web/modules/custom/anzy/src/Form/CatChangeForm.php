<?php

namespace Drupal\anzy\Form;

use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Url;
use Drupal\file\Entity\File;

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
   * Contain slug id to edit cat entry.
   *
   * @var ctid
   */
  protected $ctid = 0;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cat_change_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $cid = NULL) {
    $form['system_messages'] = [
      '#markup' => '<div id="error-warnings"></div>',
      '#weight' => -100,
    ];
    $form['name'] = [
      '#title' => t("Your cat's name:"),
      '#type' => 'textfield',
      '#size' => 32,
      '#description' => t("Name should be at least 2 characters and less than 32 characters"),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::validateNameAjax',
        'event' => 'change',
        'progress' => [
          'type' => 'throbber',
          'message' => t('Verifying name..'),
        ],
      ],
    ];
    $form['email'] = [
      '#title' => t("Email:"),
      '#type' => 'email',
      '#description' => t("example@gmail.com"),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::validateMailAjax',
        'event' => 'change',
        'progress' => [
          'type' => 'throbber',
          'message' => t('Verifying email..'),
        ],
      ],
    ];
    $form['image'] = [
      '#title' => t("Image:"),
      '#type' => 'managed_file',
      '#upload_location' => 'public://module-images',
      '#upload_validators' => [
        'file_validate_extensions' => ['png jpg jpeg'],
        'file_validate_size' => [2097152],
      ],
      '#description' => t("insert image below size of 2MB. Supported formats: png jpg jpeg."),
      '#required' => TRUE,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Edit cat'),
      '#ajax' => [
        'callback' => '::ajaxForm',
        'event' => 'click',
        'progress' => [
          'type' => 'throbber',
        ],
      ],
    ];
    $this->ctid = $cid;
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('name')) < 2) {
      $form_state->setErrorByName('name', t('The name is too short. Please enter valid name.'));
    }
    elseif (strlen($form_state->getValue('name')) > 32) {
      $form_state->setErrorByName('name', t('The name is too long. Please enter valid name.'));
    }
    elseif (!preg_match('/^[A-Za-z]*$/', $form_state->getValue('name'))) {
      $form_state->setErrorByName('name', t('The name should contain only letters. Please enter valid name.'));
    }
    if (!filter_var($form_state->getValue('email'), FILTER_VALIDATE_EMAIL)) {
      $form_state->setErrorByName('email', t('Invalid email format. Please enter valid email.'));
    }
  }

  /**
   * Function that validate name input with ajax.
   */
  public function validateNameAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (strlen($form_state->getValue('name')) < 2) {
      $response->addCommand(new HtmlCommand('#error-warnings', '<div id="message-error" class="messages messages--error"><div class="alert alert-dismissible fade show col-12 alert-danger">' . t('The name is too short. Please enter valid name.') . '</div></div>'));
    }
    elseif (strlen($form_state->getValue('name')) > 32) {
      $response->addCommand(new HtmlCommand('#error-warnings', '<div id="message-error" class="messages messages--error"><div class="alert alert-dismissible fade show col-12 alert-danger">' . t('The name is too long. Please enter valid name.') . '</div></div>'));
    }
    elseif (!preg_match('/^[A-Za-z]*$/', $form_state->getValue('name'))) {
      $response->addCommand(new HtmlCommand('#error-warnings', '<div id="message-error" class="messages messages--error"><div class="alert alert-dismissible fade show col-12 alert-danger">' . t('The name should contain only letters. Please enter valid name.') . '</div></div>'));
    }
    else {
      $response->addCommand(new HtmlCommand('#error-warnings', ''));
    }
    return $response;
  }

  /**
   * Function that validate email input with ajax.
   */
  public function validateMailAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (!filter_var($form_state->getValue('email'), FILTER_VALIDATE_EMAIL)) {
      $response->addCommand(new HtmlCommand('#error-warnings', '<div id="message-error" class="messages messages--error"><div class="alert alert-dismissible fade show col-12 alert-danger">' . t('Invalid email format. Please enter valid email.') . '</div></div>'));
    }
    else {
      $response->addCommand(new HtmlCommand('#error-warnings', ''));
    }
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $connection = \Drupal::service('database');
    $file = File::load($form_state->getValue('image')[0]);
    $file->setPermanent();
    $file->save();
    $result = $connection->update('anzy')
      ->condition('id', $this->ctid)
      ->fields([
        'name' => $form_state->getValue('name'),
        'mail' => $form_state->getValue('email'),
        'image' => $form_state->getValue('image')[0],
      ])
      ->execute();
    \Drupal::messenger()->addMessage($this->t('Form Edit Successfully'), 'status', TRUE);
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
