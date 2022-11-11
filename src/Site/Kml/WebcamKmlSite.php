<?php

namespace Nemundo\Webcam\Site\Kml;

use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Site\AbstractKmlSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Geo\Kml\Document\KmlDocument;
use Nemundo\Geo\Kml\Object\KmlMarker;
use Nemundo\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Webcam\Data\Webcam\WebcamReader;
use Nemundo\Webcam\Reader\WebcamDataReader;

class WebcamKmlSite extends AbstractKmlSite
{

    protected function loadSite()
    {
        parent::loadSite(); // TODO: Change the autogenerated stub
    }


    public function loadContent()
    {


        $document = new KmlDocument();

        $webcamReader = new WebcamDataReader();
        $webcamReader->model->loadSource();

        foreach ($webcamReader->getData() as $webcamRow) {


            $marker = new KmlMarker($document);
            $marker->label = $webcamRow->webcam;
            $marker->geoCoordinate = $webcamRow->geoCoordinate;

/*            $row = new AdminTableRow($table);
            $row->addText($webcamRow->webcam);
            $row->addText($webcamRow->source->source);

            $img = new AdminImage($row);
            $img->src = $webcamRow->imageUrl;*/

        }





        // TODO: Implement loadContent() method.
    }

}