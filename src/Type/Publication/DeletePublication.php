<?php

namespace Nemundo\Webcam\Type\Publication;

class DeletePublication extends AbstractPublication
{

    protected function loadPublication()
    {

        $this->id= 3;
        $this->publicationStatus='Delete';

    }

}