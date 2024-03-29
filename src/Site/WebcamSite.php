<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\WebcamPage;
use Nemundo\Webcam\Site\Csv\WebcamCsvSite;
use Nemundo\Webcam\Site\Json\WebcamJsonSite;
use Nemundo\Webcam\Site\Kml\WebcamKmlSite;
use Nemundo\Webcam\Site\Workflow\SendWorkflowMailSite;

class WebcamSite extends AbstractSite
{

    /**
     * @var WebcamSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Webcam';
        $this->url = 'webcam';

        new WebcamNewSite($this);
        new WebcamEditSite($this);
        new WebcamDeleteSite($this);
        new WebcamItemSite($this);
        new ImageCroppingSite($this);
        new WebcamLogSite($this);

        new WebcamContainerSite($this);

        new ImageDeleteSite($this);

        new WebcamCsvSite($this);
        new WebcamJsonSite($this);
        new WebcamKmlSite($this);

        new SourceSite($this);
        new RegionSite($this);
        new StatusSite($this);

        new SendWorkflowMailSite($this);

        WebcamSite::$site = $this;

    }

    public function loadContent()
    {
        (new WebcamPage())->render();
    }
}