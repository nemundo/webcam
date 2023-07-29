<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Content\Webcam\WebcamForm;
use Nemundo\Webcam\Content\Webcam\WebcamType;
use Nemundo\Webcam\Site\WebcamSite;

class WebcamNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);

        $form = (new WebcamType())->getStartStatusType()->getDefaultForm($layout);  // new WebcamForm($layout);
        $form->redirectSite = WebcamSite::$site;

        return parent::getContent();
    }
}