<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Site\Workflow\WorkflowSourceSite;

class PublicWebcamSite extends AbstractSite
{

    /**
     * @var PublicWebcamSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'PublicWebcam';
        $this->url = 'PublicWebcam';

        new WorkflowSourceSite($this);

    }

    public function loadContent()
    {
    }
}