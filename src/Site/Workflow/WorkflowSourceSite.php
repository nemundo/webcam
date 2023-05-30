<?php

namespace Nemundo\Webcam\Site\Workflow;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\Workflow\WorkflowSourcePage;

class WorkflowSourceSite extends AbstractSite
{

    /**
     * @var WorkflowSourceSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'WorkflowSource';
        $this->url = 'WorkflowSource';

        WorkflowSourceSite::$site = $this;

    }

    public function loadContent()
    {
        (new WorkflowSourcePage())->render();
    }
}