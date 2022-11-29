<?php

namespace Nemundo\Webcam\Com\Tab;

use Nemundo\Admin\Com\Tabs\AdminSiteTabs;
use Nemundo\Webcam\Site\WebcamSite;

class WebcamTab extends AdminSiteTabs
{

    public function getContent()
    {
        $this->site=WebcamSite::$site;
        return parent::getContent();
    }

}