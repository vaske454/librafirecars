<?php

namespace Drupal\lfc_review\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
//use Drupal\Core\Link;
//use Drupal\Core\Url;

class AjaxDashboard extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    // TODO: Implement getFormId() method.
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // TODO: Implement buildForm() method.

//    return $this->redirect('user/'.$GLOBALS['user']->uid.'/edit');
//    $form = Url::fromRoute("user/{$GLOBALS['user']->uid}/edit");
//    print Link::fromTextAndUrl(t('edit profile'), $form)->toString();
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // TODO: Implement submitForm() method.
  }

}
