<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\ImageCroppingPage;

class ImageCroppingSite extends AbstractSite
{

    /**
     * @var ImageCroppingSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'ImageCropping';
        $this->url = 'image-cropping';
        $this->menuActive = false;

        ImageCroppingSite::$site = $this;

    }

    public function loadContent()
    {
        (new ImageCroppingPage())->render();
    }
}