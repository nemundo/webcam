<?php

namespace Nemundo\Webcam\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Webcam\Data\WebcamModelCollection;
use Nemundo\Webcam\Install\WebcamInstall;
use Nemundo\Webcam\Install\WebcamUninstall;
use Nemundo\Webcam\Site\WebcamItemSite;
use Nemundo\Webcam\Site\WebcamSite;

class WebcamApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Webcam';
        $this->applicationId = '3ceca2bd-5c17-4ee1-89f9-499e2fef4664';
        $this->modelCollectionClass = WebcamModelCollection::class;
        $this->installClass = WebcamInstall::class;
        $this->uninstallClass = WebcamUninstall::class;
        $this->appSiteClass = WebcamSite::class;
        $this->publicSiteClass = WebcamItemSite::class;
    }
}