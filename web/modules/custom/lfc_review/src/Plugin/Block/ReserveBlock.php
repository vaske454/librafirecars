<?php

namespace Drupal\lfc_review\Plugin\Block;

use Drupal;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

//use Drupal\Core\Url;
//use Drupal\Core\Link;
//use Drupal\Component\Serialization\Json;

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "reserve_block",
 *   admin_label = @Translation("Reserve block"),
 *   category = @Translation("Custom reserve block")
 * )
 */
class ReserveBlock extends BlockBase{
  /**
   * {@inheritdoc}
   */
//  public function build() {
//
//    $form = Url::fromRoute('lfc_reserve.ajaxreserveform');
//
//    $link = Link::fromTextAndUrl(t('Popup'), $form)->toString();
//
//    return array(
//      '#type' => 'markup',
//      '#markup' => $link,
//      '#attached' => ['library' => ['core/drupal.dialog.ajax']],
//    );
//  }
  public function build() {
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Something'),
//      '#ajax' => [
//        'callback' => $this->blockSubmit(),
//        'event' => 'click',
//      ]
    ];
    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state) {
    Drupal::messenger()->addMessage("Uspelo rezervisanje!!!");
  }


}
