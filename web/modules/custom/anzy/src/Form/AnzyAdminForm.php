<?php

namespace Drupal\anzy\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\file\Entity\File;

/**
 * Contains \Drupal\anzy\Form\CatAdminForm.
 *
 * @file
 */

/**
 * Provides an Cat form.
 */
class AnzyAdminForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cat_admin_form';
  }

  /**
   * Get all cats for page.
   *
   * @return array
   *   A simple array.
   */
  public function load() {
    $connection = \Drupal::service('database');
    $query = $connection->select('anzy', 'a');
    $query->fields('a', ['name', 'mail', 'created', 'image', 'id']);
    $result = $query->execute()->fetchAll();
    return $result;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $info = json_decode(json_encode($this->load()), TRUE);
    $info = array_reverse($info);
    $content['message'] = [
      '#markup' => $this->t('Below is a list of all cats including username, email, image and submission date.'),
    ];
    $headers = [
      t('Cat name'),
      t('Email'),
      t('Submitted'),
      t('Photo'),
      t('Delete'),
      t('Edit'),
    ];
    $rows = [];
    foreach ($info as &$value) {
      $fid = $value['image'];
      $id = $value['id'];
      $name = $value['name'];
      $mail = $value['mail'];
      $created = $value['created'];
      array_splice($value, 0, 5);
      $renderer = \Drupal::service('renderer');
      $dest = $this->getDestinationArray();
      $dest = $dest['destination'];
      $file = File::load($fid);
      $img = [
        '#type' => 'image',
        '#theme' => 'image_style',
        '#style_name' => 'thumbnail',
        '#uri' => $file->getFileUri(),
      ];
      $value[0] = $name;
      $value[1] = $mail;
      $value[2] = $created;
      $value[3] = $renderer->render($img);
      $delete = [
        '#type' => 'link',
        '#url' => Url::fromUserInput("/admin/anzy/catsDel/$id?destination=$dest"),
        '#title' => $this->t('Delete'),
        '#attributes' => [
          'data-dialog-type' => ['modal'],
          'class' => ['button', 'use-ajax'],
        ],
      ];
      $value[4] = $renderer->render($delete);
      $edit = [
        '#type' => 'link',
        '#url' => Url::fromUserInput("/admin/anzy/catsChange/$id?destination=$dest"),
        '#title' => $this->t('Edit'),
        '#attributes' => ['class' => ['button']],
      ];
      $value[5] = $renderer->render($edit);
      $newId = [
        '#type' => 'hidden',
        '#value' => $id,
      ];
      $value[6] = $newId;
      array_push($rows, $value);
    }
    $form['table'] = [
      '#type' => 'tableselect',
      '#header' => $headers,
      '#options' => $rows,
      '#empty' => t('No entries available.'),
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Delete all'),
      '#description' => $this->t('Submit, #type = submit'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $value = $form['table']['#value'];
    $connection = \Drupal::service('database');
    foreach ($value as $key => $val) {
      $result = $connection->delete('anzy');
      $result->condition('id', $form['table']['#options'][$key][6]["#value"]);
      $result->execute();
    }
    \Drupal::messenger()->addMessage($this->t('Form Submitted Successfully'), 'status', TRUE);
  }

}
