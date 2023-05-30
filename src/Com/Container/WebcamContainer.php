<?php

namespace Nemundo\Webcam\Com\Container;

use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Layout\Flex\AdminRowFlexLayout;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Webcam\Content\Webcam\WebcamView;
use Nemundo\Webcam\Reader\Webcam\WebcamDataReader;

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

        }

        return parent::getContent();

    }

}