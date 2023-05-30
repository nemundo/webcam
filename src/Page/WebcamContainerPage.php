<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\Container\WebcamContainer;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Com\Widget\WebcamWidget;

class WebcamContainerPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        //new WebcamWidget($this);

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);

        new WebcamContainer($layout);

        return parent::getContent();
    }
}