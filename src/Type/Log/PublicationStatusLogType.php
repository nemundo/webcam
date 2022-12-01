<?php

namespace Nemundo\Webcam\Type\Log;

use Nemundo\Webcam\Data\PublicationStatusLog\PublicationStatusLogReader;

class PublicationStatusLogType extends AbstractLog
{

    protected function loadLog()
    {

        $this->id = 'Change Publication';

    }


    public function getText($dataId)
    {


        $reader = new PublicationStatusLogReader();
        $reader->model->loadPublicationStatusOld();
        $reader->model->loadPublicationStatusNew();

        $dataRow = $reader->getRowById($dataId);

        $text = 'Änderung von ' . $dataRow->publicationStatusOld->publicationStatus . ' nach ' . $dataRow->publicationStatusNew->publicationStatus;

        return $text;

    }

}