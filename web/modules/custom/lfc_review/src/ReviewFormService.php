<?php

namespace Drupal\lfc_review;

use Drupal\Core\Form\FormBuilder;
use Drupal\Core\Entity\EntityTypeManager;

/**
 * Our review form service class.
 */
class ReviewFormService {

  protected $entityManager;
  protected $formBuilder;
  public function __construct(EntityTypeManager $entityManager,FormBuilder $formBuilder) {
    $this->entityManager = $entityManager;
    $this->formBuilder = $formBuilder;
  }

  /**
   * Method for getting node title.
   */
  public function getReviewFormService($node_id = NULL) {
    $entityManager = $this->entityManager->getStorage('node')->load($node_id);
    return $entityManager -> getTitle();
  }

  /**
   * Method for calling form builder.
   */
  public function getFormBuilder($node_id) {
    return $this->formBuilder->getForm('Drupal\lfc_review\Form\AjaxReviewForm', $node_id);
  }
}

