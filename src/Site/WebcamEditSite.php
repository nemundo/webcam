<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Admin\Site\AbstractEditIconSite;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\WebcamEditPage;
use Nemundo\Webcam\Page\WebcamNewPage;

class WebcamEditSite extends AbstractEditIconSite
{

    /**
     * @var WebcamEditSite
     */
    public static $site;

    protected function loadSite()
    {

        /*$this->title = 'New Webcam';
        $this->url = 'new';
        $this->menuActive=false;*/

        WebcamEditSite::$site=$this;

    }

    public function loadContent()
    {
        (new WebcamEditPage())->render();
    }
}