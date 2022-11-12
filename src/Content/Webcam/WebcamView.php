<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Webcam\Data\Image\ImageModel;

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

        /*$p = new Paragraph($this);
        $p->content = $webcamRow->description;*/

        /*$img = new AdminImage($this);
        $img->src = $webcamRow->latestImage->image->getImageUrlWithDomain((new ImageModel())->imageAutoSize500);*/

        $img = new AdminImage($this);
        $img->src = $webcamRow->latestImage->squareImage->getImageUrlWithDomain((new ImageModel())->imageAutoSize500);


        $hyperlink = new UrlHyperlink();
        $hyperlink->openNewWindow=true;
        $hyperlink->content = $webcamRow->source->source;
        $hyperlink->url = $webcamRow->source->url;


        $p = new Paragraph($this);
        $p->content = 'Quelle '. $hyperlink->getBodyContent();  //webcamRow->source->source;

        $p = new Paragraph($this);
        $p->content = 'Update '. $webcamRow->latestImage->dateTime->getTimeLeadingZero();


        return parent::getContent();

    }
}