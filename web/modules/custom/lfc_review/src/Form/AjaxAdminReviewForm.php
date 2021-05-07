<?php

namespace Drupal\lfc_review\Form;

use Drupal;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

class AjaxAdminReviewForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
   //TODO get form id
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $node_id = NULL): array {

    $header = [
      'nid' => t('Nid'),
      'title' => t('Title'),
      'rating' => t('Rating'),
      'communication' => t('Communication'),
      'satisfaction' => t('Satisfaction'),
      'correctness' => t('Correctness'),
      'body' => t('Body'),
    ];


    $query = Drupal::entityQuery('node')
      ->condition('type', 'message')
      ->condition('status', 1)
      ->execute();
    $results = Node::loadMultiple($query);

    $data = [];
    foreach($results as $node) {
      $data[] = [
        'nid' => $node->get('nid')->value,
        'title' => $node->get('title')->value,
        'rating' => $node->get('field_rating')->value,
        'communication' => $node->get('field_communication')->value,
        'satisfaction' => $node->get('field_satisfaction')->value,
        'correctness' => $node->get('field_correctness')->value,
        'body' => $node->get('body')->value,
      ];
    }

    $form['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $data,
      '#empty' => $this->t("Don't exist!"),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    //TODO get form submit
  }
}
