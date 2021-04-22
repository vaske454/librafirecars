<?php

namespace Drupal\lfc_review\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\Component\Serialization\Json;

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
  public function build(): array {
    $form = Url::fromRoute('lfc_review.ajaxreviewform');
    $form->setOptions([
      'attributes' => [
        'class' => ['use-ajax', 'button', 'button--small'],
        'data-dialog-type' => 'modal',
        'data-dialog-options' => Json::encode(['width' => 400]),
      ]
    ]);

    return array(
      '#type' => 'markup',
      '#markup' => Link::fromTextAndUrl(t('Open modal'), $form)->toString(),
      '#attached' => ['library' => ['core/drupal.dialog.ajax']]
    );
  }

}
