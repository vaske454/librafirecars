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
  public function buildForm(array $form, FormStateInterface $form_state): array {

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
      '#submit' => array('submitForm'),
    );

     return [
       '#theme' => 'review_form',
       '#form' => $form
     ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
       Drupal::messenger()->addMessage("Uspelo!!!");
  }
}
