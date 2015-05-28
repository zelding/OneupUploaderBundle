<?php

namespace Oneup\UploaderBundle\Routing;

use Oneup\UploaderBundle\Model\ControllerRegistry;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class RouteLoader extends Loader
{
    protected $config;
    protected $registry;

    public function __construct(array $config, ControllerRegistry $registry)
    {
        $this->config = $config;
        $this->registry = $registry;
    }

    /**
     * Dynamically create the upload routes.
     *
     * @param mixed $resource
     * @param null $type
     * @return RouteCollection
     */
    public function load($resource, $type = null)
    {
        $collection = new RouteCollection();

        foreach ($this->config['mappings'] as $name => $mapping) {
            $controller = $this->registry->getController($mapping['frontend']);

            // Create a configured route object
            $route = new Route(sprintf('/_uploader/%s/upload', $name));
            $route->setMethods(['POST', 'PUT', 'PATCH']);
            $route->setDefaults([
                '_controller' => sprintf(get_class($controller), ':upload'),
                '_format' => 'json'
            ]);

            $collection->add(sprintf('_uploader_upload_%s', $name), $route);
        }

        return $collection;
    }

    public function supports($resource, $type = null)
    {
        return 'uploader' === $type;
    }
}