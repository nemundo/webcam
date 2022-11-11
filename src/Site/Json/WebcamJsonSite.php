<?php

namespace Nemundo\Webcam\Site\Json;

use Nemundo\Admin\Site\AbstractJsonSite;
use Nemundo\Core\Json\Document\JsonResponse;
use Nemundo\Webcam\Reader\WebcamDataReader;

class WebcamJsonSite extends AbstractJsonSite
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
            $data['webcam'] = $webcamRow->webcam;
            $data['image_url'] = $webcamRow->imageUrl;
            $data['latitude'] = $webcamRow->geoCoordinate->latitude;
            $data['longitude'] = $webcamRow->geoCoordinate->longitude;
            $data['source'] = $webcamRow->source->source;
            $data['source_url'] = $webcamRow->source->url;

            $json->addRow($data);

        }

        $json->render();

    }

}