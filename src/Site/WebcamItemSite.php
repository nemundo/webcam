<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\WebcamItemPage;

class WebcamItemSite extends AbstractSite
{

    /**
     * @var WebcamItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'WebcamItem';
        $this->url = 'webcam-item';
        $this->menuActive = false;

        WebcamItemSite::$site = $this;
    }

    public function loadContent()
    {
        (new WebcamItemPage())->render();
    }
}