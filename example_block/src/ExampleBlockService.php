<?php

namespace Drupal\example_block;

use Drupal\optional_dependency\OptionalDependency;

/**
 * System Manager Service.
 */
class ExampleBlockService {


  private $optionalDependency;

  /**
   * Sets optional dependency.
   *
   * @param \Drupal\optional_dependency\OptionalDependency $optionalDependency
   *   The optional dependency.
   *
   * @return $this
   */
  public function setOptionalDependency(OptionalDependency $optionalDependency) {
    $this->optionalDependency = $optionalDependency;
    return $this;
  }

  /**
   * Get optional dependency object if available.
   */
  public function getOptionalDependency() {
    if (isset($this->optionalDependency) && $this->optionalDependency instanceof OptionalDependency) {
      return $this->optionalDependency;
    }
    return NULL;
  }

}
