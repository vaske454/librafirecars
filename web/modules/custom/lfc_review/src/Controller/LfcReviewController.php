<?php

namespace Drupal\lfc_review\Controller;

use Drupal;
use Drupal\Core\Controller\ControllerBase;

/**
 * This class handles all the AJAX calls to save and update the module data.
 */
class LfcReviewController extends ControllerBase {

  public function manageAction(): array {

    return Drupal::formBuilder()->getForm('Drupal\lfc_review\Form\AjaxReviewForm');
  }
}

