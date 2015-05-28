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
     * @param string $key
     * @param AbstractUploadController $controller
     * @return $this
     */
    public function addController($key, AbstractUploadController $controller)
    {
        if (array_key_exists($key, $this->controllers)) {
            throw new \InvalidArgumentException(sprintf('The controller type "%" is already registered', $key));
        }

        $this->controllers[$key] = $controller;

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
}