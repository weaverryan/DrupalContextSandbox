<?php

namespace Drupal\Extension;

use Behat\Behat\Extension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class DrupalExtension extends Extension
{
  public function load(array $config, ContainerBuilder $container)
  {
    // todo ..
  }
}

return new DrupalExtension();