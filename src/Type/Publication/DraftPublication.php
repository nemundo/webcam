<?php

namespace Nemundo\Webcam\Type\Publication;

class DraftPublication extends AbstractPublication
{

    protected function loadPublication()
    {

        $this->id = 1;
        $this->publicationStatus = 'Draft';

    }

}