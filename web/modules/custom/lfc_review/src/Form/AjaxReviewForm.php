<?php

namespace Drupal\lfc_review\Form;

use Drupal;
//use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

//use Drupal\Core\Ajax\CloseModalDialogCommand;

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
  public function submitForm(array &$form, FormStateInterface $form_state) {
//    $response = new AjaxResponse();
//    $command = new CloseModalDialogCommand();
//    $response->addCommand($command);
//    return Drupal::messenger()->addMessage("Ocena: " . $form_state->getValue('ocena') . " Komunikacija:" . $form_state->getValue('komunikacija') . " Zadovoljstvo:" . $form_state->getValue('zadovoljstvo') . " Korektnost:" .$form_state->getValue('korektnost'));
    $params['query'] = [
      'title' => $form_state->getValue('title'),
      'ocena' => $form_state->getValue('ocena'),
      'komunikacija' => $form_state->getValue('komunikacija'),
      'zadovoljstvo' => $form_state->getValue('zadovoljstvo'),
      'konkretnost' => $form_state->getValue('konkretnost'),
      'body' => $form_state->getValue('body'),
    ];
    $form_state->setRedirectUrl(Url::fromRoute('lfc_review.admin_settings',$params));
    //$form_state->setRedirectUrl(Url::fromUri('internal:' . 'second_page', $params));
  }
}
