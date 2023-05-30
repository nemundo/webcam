<?php

namespace Nemundo\Webcam\Content\Region;

use Nemundo\Content\View\AbstractContentView;

class RegionView extends AbstractContentView
{
    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '10359527-af98-45a8-b33a-0e48c027ff14';
        $this->defaultView = true;
    }

    public function getContent()
    {
        return parent::getContent();
    }
}