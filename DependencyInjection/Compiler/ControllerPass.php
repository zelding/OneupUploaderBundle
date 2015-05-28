<?php

namespace Oneup\UploaderBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ControllerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $registry = $container->findDefinition('oneup_uploader.controller_registry');
        $definitions = $container->findTaggedServiceIds('oneup_uploader.controller');

        foreach ($definitions as $id => $tags) {
            foreach ($tags as $attributes) {

                // A oneup_uploader.controller tag must provide the "handles" key,
                // which defines the type of frontends, this controller should handle.
                if (!array_key_exists('handles', $attributes)) {
                    continue;
                }

                $key = $attributes['handles'];

                // Add this controller to the registry
                $registry->addMethodCall('addController', [$key, new Reference($id)]);
            }
        }
    }
}