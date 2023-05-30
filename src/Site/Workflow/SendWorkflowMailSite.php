<?php

namespace Nemundo\Webcam\Site\Workflow;

use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Workflow\SendWorkflowMail;

class SendWorkflowMailSite extends AbstractSite
{

    /**
     * @var WorkflowSourceSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Send Workflow';
        $this->url = 'send-workflow';
        $this->menuActive=false;

        SendWorkflowMailSite::$site = $this;

    }

    public function loadContent()
    {

        (new SendWorkflowMail())->sendMail();
        (new UrlReferer())->redirect();


    }
}