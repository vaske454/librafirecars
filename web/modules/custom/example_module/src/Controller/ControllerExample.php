<?php

namespace Drupal\example_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ControllerExample
 *
 * @package Drupal\example_module\Controller
 */
class ControllerExample extends ControllerBase {

  /**
   * @return array
   */
  public function display() {
    $message = [
      [
        'title' => 'Title one',
        ['one' => 'One'],
        'description' => 'This is my first title ever.',
        'rating' => 1
      ],
      [
        'title' => 'Title two',
        'description' => 'This is my second title ever.',
        'rating' => 2
      ],
      [
        'title' => 'Title one',
        'description' => 'This is my third title ever.',
        'rating' => 3
      ]
    ];

    $i = 0;
    if ($i<count($message)) {
      return [
        '#theme' => 'example_list',
        '#items' => $message,
      ];
    }
    else {
      return [
        '#theme' => 'example_list',
        '#items' => [],
      ];
    }
  }
}
