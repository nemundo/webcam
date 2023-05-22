<?php

namespace Nemundo\Webcam\Com\Container;

use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Admin\Com\Layout\Flex\AdminRowFlexLayout;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Core\Date\DateTimeDifference;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Webcam\Content\Webcam\WebcamView;
use Nemundo\Webcam\Data\Image\ImageModel;
use Nemundo\Webcam\Reader\WebcamDataPaginationReader;
use Nemundo\Webcam\Reader\WebcamDataReader;

class WebcamContainer extends AbstractHtmlContainer
{

    public function getContent()
    {

        $layout = new AdminRowFlexLayout($this);


        $webcamReader = new WebcamDataReader();

        $webcamReader->active = true;
        foreach ($webcamReader->getData() as $webcamRow) {

            $card = new AdminCard($layout);
            $card->cardTitle = $webcamRow->webcam;

            $view = new WebcamView($card);
            $view->dataId = $webcamRow->id;


            /*$card = new AdminCard($layout);
            $card->cardTitle = $webcamRow->webcam;

            $view = new WebcamView($card);
            $view->dataId = $webcamRow->id;*/

            /*$subtitle = new AdminSubtitle($this);
            $subtitle->content = $webcamRow->webcam;

            $img = new AdminImage($this);
            $img->src = $webcamRow->latestImage->squareImage->getImageUrlWithDomain((new ImageModel())->imageAutoSize500);


            /*$hyperlink = new UrlHyperlink();
            $hyperlink->openNewWindow=true;
            $hyperlink->content = $webcamRow->source->source;
            $hyperlink->url = $webcamRow->source->url;*/

            /*$difference = new DateTimeDifference();
            $difference->dateFrom = $webcamRow->latestImage->dateTime;
            $difference->dateUntil = (new DateTime())->setNow();

            $p = new Paragraph($this);
            $p->content = 'Vor ' . $difference->getDifferenceInMinute() . ' Minuten';*/

        }


        /*$webcamReader = new WebcamDataPaginationReader();

        $webcamReader->active = true;
        foreach ($webcamReader->getData() as $webcamRow) {

            $card = new AdminCard($layout);
            $card->cardTitle = $webcamRow->webcam;

            $view = new WebcamView($card);
            $view->dataId = $webcamRow->id;

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $webcamReader;*/

        return parent::getContent();

    }

}