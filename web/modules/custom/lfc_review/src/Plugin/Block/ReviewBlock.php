<?php

namespace Drupal\lfc_review\Plugin\Block;

use Drupal;
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

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $service = Drupal::service('path.current')->getPath();
    //TODO Find method to get nodeId directly
    $nid = explode('/', $service);
    $form = Url::fromRoute('lfc_review.manage', ['node_id' => $nid[2]]);
    $form->setOptions([
      'attributes' => [
        'class' => ['use-ajax', 'button', 'button--small'],
        'data-dialog-type' => 'modal',
        'data-dialog-options' => Json::encode(['width' => 400]),
      ]
    ]);
    $link = Link::fromTextAndUrl(t('Popup'), $form)->toString();

    return array(
      '#type' => 'markup',
      '#markup' => $link,
      '#attached' => ['library' => ['core/drupal.dialog.ajax']],
    );

  }

}
