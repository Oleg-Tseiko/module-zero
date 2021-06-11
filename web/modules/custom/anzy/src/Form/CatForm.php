<?php

namespace Drupal\anzy\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\file\Entity\File;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @file
 *
 * Contains \Drupal\anzy\Form\CatForm.
 */

/**
 * Provides an Cat form.
 */
class CatForm extends FormBase {
  /**
   * The current time.
   *
   * @var \Drupal\Core\Datatime
   */
  protected $currentTime;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->currentTime = $container->get('datetime.time');
    $instance->currentUser = $container->get('current_user');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cat_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['system_messages'] = [
      '#markup' => '<div id="form-system-messages"></div>',
      '#weight' => -100,
    ];
    $form['name'] = [
      '#title' => t("Your cat's name:"),
      '#type' => 'textfield',
      '#size' => 32,
      '#description' => t("Name should be at least 2 characters and less than 32 characters"),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => '::validateAjax',
        'event' => 'input',
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
        'callback' => '::validateAjax',
        'event' => 'input',
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
      '#value' => t('Add cat'),
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
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $connection = \Drupal::service('database');
    $file = File::load($form_state->getValue('image')[0]) ;
    $file->setPermanent();
    $file->save();
    $result = $connection->insert('anzy')
      ->fields([
        'name' => $form_state->getValue('name'),
        'mail' => $form_state->getValue('email'),
        'uid' => $this->currentUser->id(),
        'created' => date('d-m-Y', $this->currentTime->getCurrentTime()),
        'image' => $form_state->getValue('image')[0],
      ])
      ->execute();
    \Drupal::messenger()->addMessage($this->t('Form Submitted Successfully'), 'status', TRUE);
  }

  /**
   * Function that validate email input with ajax.
   */
  public function validateAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (strlen($form_state->getValue('name')) < 2) {
      $response->addCommand(new HtmlCommand('#form-system-messages', '<div class="alert alert-dismissible fade show col-12 alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>The name is too short. Please enter valid name.</div>'));
    }
    elseif (strlen($form_state->getValue('name')) > 32) {
      $response->addCommand(new HtmlCommand('#form-system-messages', '<div class="alert alert-dismissible fade show col-12 alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>The name is too long. Please enter valid name.</div>'));
    }
    elseif (!preg_match('/^[A-Za-z]*$/', $form_state->getValue('name'))) {
      $response->addCommand(new HtmlCommand('#form-system-messages', '<div class="alert alert-dismissible fade show col-12 alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>The name should contain only letters. Please enter valid name.</div>'));
    }
    elseif (!filter_var($form_state->getValue('email'), FILTER_VALIDATE_EMAIL)) {
      $response->addCommand(new HtmlCommand('#form-system-messages', '<div class="alert alert-dismissible fade show col-12 alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Invalid email format. Please enter valid email.</div>'));
    }
    else {
      $response->addCommand(new HtmlCommand('#form-system-messages', ''));
    }
    return $response;
  }

  /**
   * Function to validate form with ajax.
   */
  public function ajaxForm(array &$form, FormStateInterface $form_state) {
    $ajax_response = new AjaxResponse();
    $message = [
      '#theme' => 'status_messages',
      '#message_list' => $this->messenger()->all(),
      '#status_headings' => [
        'status' => t('Status message'),
        'error' => t('Error message'),
        'warning' => t('Warning message'),
      ],
    ];
    $messages = \Drupal::service('renderer')->render($message);
    $ajax_response->addCommand(new HtmlCommand('#form-system-messages', $messages));
    return $ajax_response;
  }

}
