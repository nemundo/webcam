<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\WebcamNewPage;

class WebcamNewSite extends AbstractNewIconSite
{

    /**
     * @var WebcamNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New Webcam';
        $this->url = 'new';
        $this->menuActive=false;

        WebcamNewSite::$site=$this;

    }

    public function loadContent()
    {
        (new WebcamNewPage())->render();
    }
}