<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Content\Type\AbstractContentRemove;
use Nemundo\Webcam\Data\Webcam\WebcamDelete;

class WebcamRemove extends AbstractContentRemove
{
    protected function loadRemove()
    {
        $this->contentType = new WebcamType();
    }

    protected function onDelete()
    {
        (new WebcamDelete())->deleteById($this->dataId);
    }
}