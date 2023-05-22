<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\Container\WebcamContainer;
use Nemundo\Webcam\Com\Widget\WebcamWidget;

class WebcamContainerPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        //new WebcamWidget($this);

        new WebcamContainer($this);

        return parent::getContent();
    }
}