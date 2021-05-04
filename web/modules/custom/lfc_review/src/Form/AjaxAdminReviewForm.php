<?php

namespace Drupal\lfc_review\Form;


use Drupal;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
//use Drupal\Core\Url;

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
      'title' => t('Title'),
      'ocena' => t('Ocena'),
      'komunikacija' => t('Komunikacija'),
      'zadovoljstvo' => t('Zadovoljstvo'),
      'korektnost' => t('Korektnost'),
      'body' => t('Body'),
    ];

    $title = Drupal::request()->query->get('title');
    $ocena = Drupal::request()->query->get('ocena');
    $komunikacija = Drupal::request()->query->get('komunikacija');
    $zadovoljstvo = Drupal::request()->query->get('zadovoljstvo');
    $korektnost = Drupal::request()->query->get('korektnost');
    $body = Drupal::request()->query->get('body');

    $option = array(
      'title' => $title,
      'ocena' => $ocena,
      'komunikacija' => $komunikacija,
      'zadovoljstvo' => $zadovoljstvo,
      'korektnost' => $korektnost,
      'body' => $body
    );



    $form['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#options' => $option,
      '#empty' => $this->t("Don't exist!")
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
//    $params['query'] = [
//      'candidate_name' => $form_state->getValue('candidate_name'),
//    ];
//
//    $form_state->setRedirectUrl(Url::fromUri('internal:' . 'second_page', $params));
  }
}
