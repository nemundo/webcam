<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\Container\WebcamContainer;

class WebcamContainerPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        new WebcamContainer($this);

        return parent::getContent();
    }
}