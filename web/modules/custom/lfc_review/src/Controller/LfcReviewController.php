<?php

namespace Drupal\lfc_review\Controller;

use Drupal;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;

/**
 * This class handles all the AJAX calls to save and update the module data.
 */
class LfcReviewController extends ControllerBase {
  public function openPopup($node_id): AjaxResponse {
    $options = [
      'dialogClass' => 'popup-dialog-class',
      'width' => '50%',
    ];
    $response = new AjaxResponse();
    $service = Drupal::service('lfc_review.title');
    $modal_form = $service;
    $response->addCommand(new OpenModalDialogCommand(t('Modal title'), $modal_form->getFormBuilder($node_id), $options));
    return $response;
  }
}

