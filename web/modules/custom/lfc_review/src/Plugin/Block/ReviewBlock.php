<?php

namespace Drupal\lfc_review\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'article' block.
 *
 * @Block(
 *   id = "review_block",
 *   admin_label = @Translation("Review block"),
 *   category = @Translation("Custom review block")
 * )
 */
class ReviewBlock extends BlockBase {
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\lfc_review\Form\AjaxReviewForm');

    return $form;
  }

}
