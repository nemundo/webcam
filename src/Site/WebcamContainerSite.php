<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\WebcamContainerPage;

class WebcamContainerSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Webcam Container';
        $this->url = 'webcam-container';
    }

    public function loadContent()
    {
        (new WebcamContainerPage())->render();
    }
}