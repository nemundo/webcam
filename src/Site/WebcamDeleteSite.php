<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Webcam\Content\Webcam\WebcamRemove;
use Nemundo\Webcam\Parameter\WebcamParameter;

class WebcamDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var WebcamDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        WebcamDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $webcamId = (new WebcamParameter())->getValue();
        (new WebcamRemove($webcamId))->removeItem();

        (new UrlReferer())->redirect();

    }
}