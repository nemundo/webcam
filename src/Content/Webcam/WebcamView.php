<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Content\View\AbstractContentView;

class WebcamView extends AbstractContentView
{
    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '67d690c6-35e9-4c84-975a-226ca8b221d4';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $webcamRow = (new WebcamItem($this->dataId))->getDataRow();

        $img = new AdminImage($this);
        $img->src = $webcamRow->imageUrl;


        return parent::getContent();
    }
}