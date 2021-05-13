<?php

namespace Drupal\lfc_review\Form;

use Drupal;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\node\Entity\Node;

class AjaxReviewForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'review_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $node_id = NULL): array {
    $node = Drupal::service('lfc_review.title');
    $title = $node;

    $form['title'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' disabled' => 'disabled',
      ),
      '#value' =>$title->getReviewFormService($node_id),
    );

    $form['rating'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        ' min' => 1,
        ' max' => 5
      ),
      '#title' => t('Enter rating:'),
      '#required' => TRUE,
    );

    $form['communication'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        ' min' => 1,
        ' max' => 5
      ),
      '#title' => t('Rate communication with seller:'),
      '#required' => TRUE,
    );

    $form['satisfaction'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        ' min' => 1,
        ' max' => 5
      ),
      '#title' => t('Satisfaction with the purchased car:'),
      '#required' => TRUE,
    );

    $form['correctness'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        ' min' => 1,
        ' max' => 5
      ),
      '#title' => t('The correctness of the ad:'),
      '#required' => TRUE,
    );

    $form['body'] = array(
      '#type' => 'text_format',
      '#title' => 'Body',
      '#format' => 'restricted_html',
      '#default_value' => 'Enter some text.',
      '#required' => TRUE
    );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Message'),
      '#attributes' => [
        'onclick' => 'return true;'
      ],
      '#attached' => array(
        'library' => array(
          'lfc_review/lfc_review.style',
        ),
      ),
    );

    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $form;
  }

  /**
   * {@inheritdoc}
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    Drupal::messenger()->addMessage("Uspeo si");

    $query = Drupal::entityQuery('node')
      ->condition('type', 'car')
      ->condition('status', 1)
      ->execute();
    $results = Node::loadMultiple($query);

    $data = [];
    foreach($results as $node) {
      $data = [
        'nid' => $node->get('nid')->value
      ];
    }

    $params['query'] = [
      'title' => $form_state->getValue('title'),
      'rating' => $form_state->getValue('rating'),
      'communication' => $form_state->getValue('communication'),
      'satisfaction' => $form_state->getValue('satisfaction'),
      'correctness' => $form_state->getValue('correctness'),
      'body' => $form_state->getValue('body'),
      'origin' => $data['nid']
    ];

    $node = Node::create(array(
      'type' => 'message',
      'title' => $params['query']['title'],
      'langcode' => 'en',
      'uid' => '1',
      'status' => 1,
      'body' => $params['query']['body'],
      'field_rating' => $params['query']['rating'],
      'field_communication' => $params['query']['communication'],
      'field_satisfaction' => $params['query']['satisfaction'],
      'field_correctness' => $params['query']['correctness'],
      'field_origin' => $params['query']['origin']
    ));

    $node->save();

    $form_state->setRedirectUrl(Url::fromRoute('lfc_review.admin_settings',$params));
  }
}
