<?php

namespace Drupal\lfc_review\Form;

use Drupal;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

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
      '#type' => 'markup',
      '#markup' => '<h2>' . $title->getReviewFormService($node_id) . '</h2>',
    );


    $form['ocena'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        ' min' => 1,
        ' max' => 5
      ),
      '#title' => t('Unesi ocenu:'),
      '#required' => TRUE,
    );

    $form['komunikacija'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        ' min' => 1,
        ' max' => 5
      ),
      '#title' => t('Oceni komunikaciju sa prodavcem:'),
      '#required' => TRUE,
    );

    $form['zadovoljstvo'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        ' min' => 1,
        ' max' => 5
      ),
      '#title' => t('Zadovoljstvo sa kupljenim autom:'),
      '#required' => TRUE,
    );

    $form['korektnost'] = array(
      '#type' => 'textfield',
      '#attributes' => array(
        ' type' => 'number',
        ' min' => 1,
        ' max' => 5
      ),
      '#title' => t('Korektnost oglasa:'),
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
    );

    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): Drupal\Core\Messenger\MessengerInterface {
       return Drupal::messenger()->addMessage("Uspelo!!!");
  }
}
