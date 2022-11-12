<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Content\Webcam\WebcamForm;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Site\WebcamSite;

class WebcamEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $form = new WebcamForm($this);
        $form->dataId = (new WebcamParameter())->getValue();
        $form->redirectSite = WebcamSite::$site;

        return parent::getContent();
    }
}