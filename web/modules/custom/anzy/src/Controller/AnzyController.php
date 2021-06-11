<?php

namespace Drupal\anzy\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\file\Entity\File;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides route responses for the Anzy module.
 */
class AnzyController extends ControllerBase {

  /**
   * Form build interface.
   *
   * @var Drupal\Core\Form\FormBase
   */
  protected $formBuilder;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->formBuilder = $container->get('form_builder');
    return $instance;
  }

  /**
   * Return form for cats.
   */
  public function form() {
    $form = $this->formBuilder->getForm('\Drupal\anzy\Form\CatForm');
    return $form;
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
    $query->fields('a', ['name', 'mail', 'created', 'image']);
    $result = $query->execute()->fetchAll();
    return $result;
  }

  /**
   * Render all cat entries.
   */
  public function report() {
    $content = [];
    $content['form'] = $this->form();
    $content['message'] = [
      '#markup' => $this->t('Below is a list of all cats including username, email, image and submission date.'),
    ];
    $headers = [
      t('Cat name'),
      t('Email'),
      t('Created'),
      t('Photo'),
    ];
    $info = json_decode(json_encode($this->load()), TRUE);
    $info = array_reverse($info);
    $rows = [];
    foreach ($info as &$value) {
      $value['created'] = date('d-m-Y', $value['created']);
      $fid = $value['image'];
      $file = File::load($fid);
      $value['image'] = [
        '#type' => 'image',
        '#theme' => 'image_style',
        '#style_name' => 'thumbnail',
        '#uri' => !empty($file) ? $file->getFileUri() : '',
      ];
      $renderer = \Drupal::service('renderer');
      $value['image'] = $renderer->render($value['image']);
      array_push($rows, $value);
    }
    $content['table'] = [
      '#type' => 'table',
      '#header' => $headers,
      '#rows' => $rows,
      '#empty' => t('No entries available.'),
    ];
    return $content;
  }

}
