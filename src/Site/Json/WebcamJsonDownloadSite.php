<?php

namespace Nemundo\Webcam\Site\Json;

use Nemundo\Admin\Site\AbstractJsonSite;
use Nemundo\Core\Json\Document\JsonResponse;
use Nemundo\Webcam\Reader\Webcam\WebcamDataReader;

class WebcamJsonDownloadSite extends AbstractJsonSite
{

    /**
     * @var WebcamJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        parent::loadSite();
        WebcamJsonSite::$site = $this;

    }


    public function loadContent()
    {



        $json = new JsonResponse();


        $webcamReader = new WebcamDataReader();
        $webcamReader->model->loadSource();

        foreach ($webcamReader->getData() as $webcamRow) {

            $data = [];
            $data['id'] = $webcamRow->id;
            $data['webcam'] = $webcamRow->webcam;
            $data['description'] = $webcamRow->description;


            $dimension = $webcamRow->croppingImage->getCroppingDimension();

            $cropping = [];
            $cropping['x']= $dimension->x;
            $cropping['y']= $dimension->y;
            $cropping['width']= $dimension->width;
            $cropping['height']= $dimension->height;
            $data['cropping'] = $cropping;  // $webcamRow->croppingImage->getCroppingDimension()->x;

            $data['direction'] = $webcamRow->direction;
            $data['image_url'] = $webcamRow->imageUrl;
            $data['geo_coordinate']['latitude'] = $webcamRow->geoCoordinate->latitude;
            $data['geo_coordinate']['longitude'] = $webcamRow->geoCoordinate->longitude;
            $data['source_id'] = $webcamRow->sourceId;
            $data['source'] = $webcamRow->source->source;
            $data['source_url'] = $webcamRow->source->url;

            $json->addRow($data);

        }

        $json->render();

    }

}