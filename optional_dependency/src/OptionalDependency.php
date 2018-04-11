<?php

namespace Drupal\optional_dependency;

use Drupal\Core\Path\CurrentPathStack;

/**
 * Optional dependency.
 */
class OptionalDependency {

  /**
   * The current path service.
   *
   * @var \Drupal\Core\Path\CurrentPathStack
   */
  protected $currentPath;

  /**
   * Constructs a OptionalDependency object.
   *
   * @param \Drupal\Core\Path\CurrentPathStack $current_path
   *   The current path.
   */
  public function __construct(CurrentPathStack $current_path) {
    $this->currentPath = $current_path;
  }

  /**
   * Checks for requirement severity.
   *
   * @return bool
   *   Returns the status of the system.
   */
  public function getCurrentPath() {
    return $this->currentPath->getPath();
  }

}
