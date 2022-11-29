<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\WebcamPage;
use Nemundo\Webcam\Site\Csv\WebcamCsvSite;
use Nemundo\Webcam\Site\Json\WebcamJsonSite;
use Nemundo\Webcam\Site\Kml\WebcamKmlSite;

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

        new WebcamCsvSite($this);
        new WebcamJsonSite($this);
        new WebcamKmlSite($this);

        new SourceSite($this);
        new StatusSite($this);


        WebcamSite::$site = $this;

    }

    public function loadContent()
    {
        (new WebcamPage())->render();
    }
}