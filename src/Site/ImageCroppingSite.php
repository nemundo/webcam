<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Admin\Site\AbstractAdminIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\ImageCroppingPage;

class ImageCroppingSite extends AbstractAdminIconSite
{

    /**
     * @var ImageCroppingSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Image Cropping';
        $this->url = 'image-cropping';
        $this->iconName = 'image';
        $this->menuActive = false;

        ImageCroppingSite::$site = $this;

    }

    public function loadContent()
    {
        (new ImageCroppingPage())->render();
    }
}