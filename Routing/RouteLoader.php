<?php

namespace Oneup\UploaderBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class RouteLoader extends Loader
{
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

        return $collection;
    }

    public function supports($resource, $type = null)
    {
        return 'uploader' === $type;
    }
}