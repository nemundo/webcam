<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\SourcePage;

class SourceSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Source';
        $this->url = 'source';
    }

    public function loadContent()
    {
        (new SourcePage())->render();
    }
}