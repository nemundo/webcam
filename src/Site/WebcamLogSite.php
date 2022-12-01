<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\WebcamLogPage;

class WebcamLogSite extends AbstractSite
{

    /**
     * @var WebcamLogSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'WebcamLog';
        $this->url = 'WebcamLog';
        $this->menuActive = false;

        WebcamLogSite::$site= $this;

    }

    public function loadContent()
    {
        (new WebcamLogPage())->render();
    }
}