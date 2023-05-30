<?php

namespace Nemundo\Webcam\Import;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Webcam\Content\Webcam\WebcamBuilder;
use Nemundo\Webcam\Data\Webcam\WebcamCount;

class JsonWebcamImport extends AbstractBase
{

    public function importJson($jsonFilename)
    {

        $reader = new JsonReader();
        $reader->fromFilename($jsonFilename);
        foreach ($reader->getData() as $jsonRow) {

            (new Debug())->write($jsonRow);

            $imageUrl = $jsonRow['image_url'];

            $count = new WebcamCount();
            $count->filter->andEqual($count->model->imageUrl, $imageUrl);
            if ($count->getCount() == 0) {

                $builder = new WebcamBuilder();
                $builder->webcam = $jsonRow['webcam'];
                $builder->imageUrl = $imageUrl;

                $geoCoordinate = $jsonRow['geo_coordinate'];

                $builder->geoCoordinate->latitude = $geoCoordinate['latitude'];
                $builder->geoCoordinate->longitude = $geoCoordinate['longitude'];
                $builder->buildContent();


                /*    [id] => 2
            [webcam] => Arosa
                    [description] =>
            [cropping] => Array
                    (
                        [x] => 3319
                    [y] => 28
                    [width] => 1415
                    [height] => 796
                )

            [direction] => 0
            [image_url] => https://baerenland.roundshot.com/cams/804/half
            [geo_coordinate] => Array
                    (
                        [latitude] => 46.76971252639
                    [longitude] => 9.6324411907655
                )

            [source_id] => 0
            [source] =>
            [source_url] => */

            } else {

                (new Debug())->write('Webcam already exists: ' . $imageUrl);

            }


        }


    }

}