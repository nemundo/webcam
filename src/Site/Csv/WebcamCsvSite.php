<?php

namespace Nemundo\Webcam\Site\Csv;

use Nemundo\Admin\Site\AbstractCsvSite;
use Nemundo\Core\Csv\Document\CsvDocument;
use Nemundo\Webcam\Reader\WebcamDataReader;

class WebcamCsvSite extends AbstractCsvSite
{

    /**
     * @var WebcamCsvSite
     */
    public static $site;

    protected function loadSite()
    {

        parent::loadSite();
        WebcamCsvSite::$site = $this;

    }


    public function loadContent()
    {

        $csv = new CsvDocument('webcam.csv');

        $header = [];
        $header[] = 'id';
        $header[] = 'webcam';
        $header[] = 'description';
        $header[] = 'direction';
        $header[] = 'image_url';
        $header[] = 'lat';
        $header[] = 'lon';

        $header['source'] = 'source';
        $header['source_url'] = 'source_url';

        $csv->addRow($header);

        $webcamReader = new WebcamDataReader();
        $webcamReader->model->loadSource();
        foreach ($webcamReader->getData() as $webcamRow) {

            $data = [];
            $data[] = $webcamRow->id;
            $data[] = $webcamRow->webcam;
            $data[] = $webcamRow->description;
            $data[] = $webcamRow->direction;
            $data[] = $webcamRow->geoCoordinate->latitude;
            $data[] = $webcamRow->geoCoordinate->longitude;
            $data[] = $webcamRow->imageUrl;
            $data[] = $webcamRow->source->source;
            $data[] = $webcamRow->source->url;

            $csv->addRow($data);

        }

        $csv->render();

    }

}