<?php

namespace Oneup\UploaderBundle\Model;

class ControllerRegistry
{
    protected $controllers;

    public function __construct()
    {
        $this->controllers = [];
    }

    /**
     * Add a controller to the registry.
     *
     * @param string $type
     * @param AbstractUploadController $controller
     * @return $this
     */
    public function addController($type, AbstractUploadController $controller)
    {
        if (array_key_exists($type, $this->controllers)) {
            throw new \InvalidArgumentException(sprintf('The controller type "%" is already registered.', $type));
        }

        $this->controllers[$type] = $controller;

        return $this;
    }

    /**
     * Return an array of registered controller
     * of type AbstractUploadController.
     *
     * @return array
     */
    public function getControllers()
    {
        return $this->controllers;
    }

    /**
     * Get a specific controller.
     *
     * @param $type
     * @return AbstractUploadController
     */
    public function getController($type)
    {
        if (!array_key_exists($type, $this->controllers)) {
            throw new \InvalidArgumentException(sprintf('No controller of type "%s" is registered."', $type));
        }

        return $this->controllers[$type];
    }
}