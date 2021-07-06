<?php

namespace Drupal\anzy\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Contains \Drupal\anzy\Form\CatDeleteForm.
 *
 * @file
 */

/**
 * Provides an Cat form.
 */
class CatDeleteForm extends FormBase {
  /**
   * Contain slug id to delete cat entry.
   *
   * @var ctid
   */
  protected $ctid = 0;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cat_delete_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $cid = NULL) {
    $form['delete'] = [
      '#type' => 'submit',
      '#value' => t('Delete'),
    ];
    $this->ctid = $cid;
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $connection = \Drupal::service('database');
    $result = $connection->delete('anzy');
    $result->condition('id', $this->ctid);
    $result->execute();
    \Drupal::messenger()->addMessage($this->t('Entry deleted successfully'), 'status', TRUE);
  }

}
