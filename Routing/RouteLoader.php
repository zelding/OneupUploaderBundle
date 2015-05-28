<?php

namespace Oneup\UploaderBundle\Routing;

use Oneup\UploaderBundle\Model\ControllerRegistry;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class RouteLoader extends Loader
{
    protected $registry;

    public function __construct(ControllerRegistry $registry)
    {
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

        /** @var array $controllers */
        $controllers = $this->registry->getControllers();

        foreach ($controllers as $key => $controller) {
            // Create a configured route object
            $route = new Route(sprintf('/_uploader/%s/upload', $key));
            $route->setMethods(['POST', 'PUT', 'PATCH']);
            $route->setDefaults([
                '_controller' => sprintf(get_class($controller), ':upload'),
                '_format' => 'json'
            ]);

            $collection->add(sprintf('_uploader_upload_%s', $key), $route);
        }

        return $collection;
    }

    public function supports($resource, $type = null)
    {
        return 'uploader' === $type;
    }
}