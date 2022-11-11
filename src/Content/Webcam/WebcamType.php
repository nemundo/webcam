<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Content\Type\AbstractContentType;

class WebcamType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Webcam';
        $this->typeId = '13852086-9b46-4df9-836c-8e346031ed23';
        $this->formClassList[] = WebcamForm::class;
        $this->viewClassList[] = WebcamView::class;
        $this->itemClass = WebcamItem::class;
    }
}