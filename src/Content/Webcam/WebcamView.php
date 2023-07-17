<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Admin\Com\Hyperlink\AdminSiteHyperlinkContainer;
use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Date\DateTimeDifference;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Fancybox\FancyboxHyperlink;
use Nemundo\Webcam\Data\Image\ImageModel;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Site\WebcamItemSite;

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

        /*$webcamRow = (new WebcamItem($this->dataId))->getDataRow();

        $hyperlink = new FancyboxHyperlink($this);
        $hyperlink->imageUrl = $webcamRow->latestImage->squareImage->getImageUrlWithDomain((new ImageModel())->squareImageAutoSize1500);
        $hyperlink->caption = $webcamRow->webcam;

        $img = new AdminImage($hyperlink);
        $img->src = $webcamRow->latestImage->squareImage->getImageUrlWithDomain((new ImageModel())->imageAutoSize500);




        $hyperlink = new UrlHyperlink();
        $hyperlink->openNewWindow=true;
        $hyperlink->content = $webcamRow->source->source;
        $hyperlink->url = $webcamRow->source->url;


        $difference = new DateTimeDifference();
        $difference->dateFrom = $webcamRow->latestImage->dateTime;
        $difference->dateUntil = (new DateTime())->setNow();

        $p = new Paragraph($this);
        $p->content = 'Vor '. $difference->getDifferenceInMinute().' Minuten';

        /*$p = new Paragraph($this);
        $p->content = 'Quelle: '. $webcamRow->source->source;*/

        /*$p = new Paragraph($this);
        $p->content = 'Region '. $webcamRow->region->region;


        $p = new Paragraph($this);
        $p->content = 'Quelle: '. $hyperlink->getBodyContent();  //webcamRow->source->source;

        $p = new Paragraph($this);
        $p->content = 'Update: '. $webcamRow->latestImage->dateTime->getTimeLeadingZero();*/


        return parent::getContent();

    }
}