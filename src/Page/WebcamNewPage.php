<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Content\Webcam\WebcamForm;
use Nemundo\Webcam\Site\WebcamSite;

class WebcamNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $form = new WebcamForm($this);
        $form->redirectSite = WebcamSite::$site;

        return parent::getContent();
    }
}