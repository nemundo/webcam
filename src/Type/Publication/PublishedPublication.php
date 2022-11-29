<?php

namespace Nemundo\Webcam\Type\Publication;

class PublishedPublication extends AbstractPublication
{

    protected function loadPublication()
    {

        $this->id = 2;
        $this->publicationStatus = 'Published';

    }

}