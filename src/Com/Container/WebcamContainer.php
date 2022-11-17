<?php

namespace Nemundo\Webcam\Com\Container;

use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Layout\Flex\AdminRowFlexLayout;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Webcam\Content\Webcam\WebcamView;
use Nemundo\Webcam\Reader\WebcamDataPaginationReader;

class WebcamContainer extends AbstractHtmlContainer
{

    public function getContent()
    {

        $layout = new AdminRowFlexLayout($this);

        $webcamReader = new WebcamDataPaginationReader();
        $webcamReader->active = true;
        foreach ($webcamReader->getData() as $webcamRow) {

            $card = new AdminCard($layout);
            $card->cardTitle = $webcamRow->webcam;

            $view = new WebcamView($card);
            $view->dataId = $webcamRow->id;

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $webcamReader;

        return parent::getContent();

    }

}