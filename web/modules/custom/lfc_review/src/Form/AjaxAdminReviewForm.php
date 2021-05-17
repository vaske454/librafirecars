<?php

namespace Drupal\lfc_review\Form;

use Drupal;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

class AjaxAdminReviewForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
   return 'admin_review_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $node_id = NULL): array {

    $header = [
      'nid' => t('Nid'),
      'origin' => t('Origin'),
      'title' => t('Title'),
      'rating' => t('Rating'),
      'communication' => t('Communication'),
      'satisfaction' => t('Satisfaction'),
      'correctness' => t('Correctness'),
      'body' => t('Body'),
      'accept' => t('Accept'),
      'deny' => t('Deny')
    ];

    $form['contacts'] = [
      '#type' => 'table',
      '#header' => $header,
      '#empty' => $this->t("Don't exist!"),
    ];


    $query = Drupal::entityQuery('node')
      ->condition('type', 'message')
      ->condition('status', 1)
      ->execute();
    $results = Node::loadMultiple($query);

   // $data = [];

    foreach($results as $node) {
      $data = [
        'nid' => $node->get('nid')->value,
        'title' => $node->get('title')->value,
        'origin' => $node->get('field_origin')->value,
        'rating' => $node->get('field_rating')->value,
        'communication' => $node->get('field_communication')->value,
        'satisfaction' => $node->get('field_satisfaction')->value,
        'correctness' => $node->get('field_correctness')->value,
        'body' => $node->get('body')->value,
      ];

      $nid = $data['nid'];
      //$nid = '';
      $form['contacts'][$nid]['nid'] = [
        '#type' => 'textfield',
        '#default_value' => $node->get('nid')->value,
        '#attributes' => [
          ' disabled' => 'disabled',
        ],
      ];

      $form['contacts'][$nid]['origin'] = [
        '#type' => 'textfield',
        '#default_value' => $node->get('field_origin')->value,
        '#attributes' => [
          ' disabled' => 'disabled',
        ],
      ];

      $form['contacts'][$nid]['title'] = [
        '#type' => 'textfield',
        '#default_value' => $node->get('title')->value,
        '#attributes' => [
          ' disabled' => 'disabled',
        ],
      ];

      $form['contacts'][$nid]['rating'] = [
        '#type' => 'textfield',
        '#default_value' => $node->get('field_rating')->value,
        '#attributes' => [
          ' disabled' => 'disabled',
        ],
      ];

      $form['contacts'][$nid]['communication'] = [
        '#type' => 'textfield',
        '#default_value' => $node->get('field_communication')->value,
        '#attributes' => [
          ' disabled' => 'disabled',
        ],
      ];

      $form['contacts'][$nid]['satisfaction'] = [
        '#type' => 'textfield',
        '#default_value' => $node->get('field_satisfaction')->value,
        '#attributes' => [
          ' disabled' => 'disabled',
        ],
      ];

      $form['contacts'][$nid]['correctness'] = [
        '#type' => 'textfield',
        '#default_value' => $node->get('field_correctness')->value,
        '#attributes' => [
          ' disabled' => 'disabled',
        ],
      ];

      $form['contacts'][$nid]['body'] = [
        '#type' => 'textfield',
        '#default_value' => $node->get('body')->value,
        '#attributes' => [
          ' disabled' => 'disabled',
        ],
      ];

      $form['contacts'][$nid]['accept'] = [
        '#type' => 'submit',
        '#value' => 'Accept',
        //          '#submit' => array('formActionAccept')
      ];

      $form['contacts'][$nid]['deny'] = [
        '#type' => 'submit',
        '#value' => 'Deny',
        '#submit' => array('openPopup')
      ];
    }

    return $form;
  }

  public function openPopup($node_id): AjaxResponse {
    $options = [
      'dialogClass' => 'popup-dialog-class',
      'width' => '50%',
    ];
    $response = new AjaxResponse();
    $service = Drupal::service('lfc_review.denyform');
    $modal_form = $service;
    $response->addCommand(new OpenModalDialogCommand(t('Modal title'), $modal_form->getFormBuilder($node_id), $options));
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    //TODO get form submit
  }
}
