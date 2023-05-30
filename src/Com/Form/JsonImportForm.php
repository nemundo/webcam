<?php

namespace Nemundo\Webcam\Com\Form;

use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminFileUpload;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Webcam\Content\Webcam\WebcamBuilder;
use Nemundo\Webcam\Import\JsonWebcamImport;

class JsonImportForm extends AbstractAdminForm
{

    /**
     * @var AdminFileUpload
     */
    private $file;

    public function getContent()
    {

        $this->file = new AdminFileUpload($this);
        $this->file->label = 'Json File';
        $this->file->acceptFileType = '.json';

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $jsonFilename = (new TmpPath())
            ->addPath('import.json')
            ->getFullFilename();

        $this->file->getFileRequest()->saveFile($jsonFilename);

        (new JsonWebcamImport())->importJson($jsonFilename);


        /*$reader = new JsonReader();
        $reader->fromFilename($jsonFilename);
        foreach ($reader->getData() as $jsonRow) {

            (new Debug())->write($jsonRow);

            $builder = new WebcamBuilder();
            $builder->webcam = $jsonRow['webcam'];
            $builder->imageUrl = $jsonRow['image_url'];

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



        /*}*/


        exit;




    }


}