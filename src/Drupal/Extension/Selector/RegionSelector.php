<?php

namespace Drupal\Extension\Selector;

use Behat\Mink\Selector\SelectorInterface;

class RegionSelector implements SelectorInterface
{
  /**
   * Translates provided locator into XPath.
   *
   * @param string $locator current selector locator
   *
   * @return string
   */
  public function translateToXPath($locator)
  {
    var_dump($locator);
    // todo!
  }

}