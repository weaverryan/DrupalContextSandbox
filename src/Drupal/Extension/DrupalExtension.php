<?php

namespace Drupal\Extension;

use Behat\Behat\Extension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class DrupalExtension extends Extension
{
  public function load(array $config, ContainerBuilder $container)
  {
    $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/config'));
    $loader->load('services.yml');

    $container->setParameter('drupal.region_map', $config['regions']);
  }

  public function getConfig(ArrayNodeDefinition $builder)
  {
    // defining what type of configuration can be passed into this extension
    $builder->
      children()->
        // this says, have a "regions" key, which takes a key-value array
        arrayNode('regions')->
          useAttributeAsKey('key')->
          prototype('variable')->end()->
        end()->
      end()
    ;

  }


}

return new DrupalExtension();