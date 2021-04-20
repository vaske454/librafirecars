<?php

namespace Drupal\lfc_review\Form;

use Drupal;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class AjaxReviewForm extends FormBase {
  public function getFormId() {
    return 'review_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Enter title:'),
      '#required' => TRUE,
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

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Message'),
    );

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state): array {
    Drupal::messenger()->addMessage("Yes it work!");
    return [
      '#theme' => 'review',
      '#items' => $form
    ];
  }

}
