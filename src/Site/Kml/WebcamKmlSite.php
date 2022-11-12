<?php

namespace Nemundo\Webcam\Site\Kml;

use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Site\AbstractKmlSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlMarker;
use Nemundo\Webcam\Content\Webcam\WebcamView;
use Nemundo\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Webcam\Reader\WebcamDataReader;

class WebcamKmlSite extends AbstractKmlSite
{

    /**
     * @var WebcamKmlSite
     */
    public static $site;

    protected function loadSite()
    {
        parent::loadSite();
        WebcamKmlSite::$site=$this;
    }


    public function loadContent()
    {

        $kml = new KmlDocument();

        $webcamReader = new WebcamDataReader();
        $webcamReader->model->loadSource();

        foreach ($webcamReader->getData() as $webcamRow) {

            $marker = new KmlMarker($kml);
            $marker->label = $webcamRow->webcam;
            $marker->geoCoordinate = $webcamRow->geoCoordinate;

            $view = new WebcamView();
            $view->dataId = $webcamRow->id;

            $marker->description = $view->getBodyContent();

        }

        $kml->render();


    }

}