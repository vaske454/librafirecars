<?php

namespace Drupal\lfc_review\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DenyForm
 *
 * @package Drupal\lfc_review\Form
 */
class DenyForm extends FormBase {

  /**
   * @return string
   */
  public function getFormId() {
    return 'deny_form';
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state) {



    $form['body'] = array(
      '#type' => 'text_format',
      '#title' => 'Why?',
      '#format' => 'restricted_html',
      '#required' => TRUE
    );

    return $form;
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // TODO: Implement submitForm() method.
  }

}
