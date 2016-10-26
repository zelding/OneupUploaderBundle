<?php

namespace Oneup\UploaderBundle\EventListener;

use Oneup\UploaderBundle\Event\ChunkValidationEvent;
use Oneup\UploaderBundle\Uploader\Exception\ValidationException;

class MaxChunkSizeValidationListener
{
    public function onValidate(ChunkValidationEvent $event)
    {
        $config = $event->getConfig();
        $file   = $event->getFile();

        if ($file->getSize() > $config['chunk_max_size']) {
            throw new ValidationException('error.maxchunksize');
        }
    }
}