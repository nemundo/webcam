<?php

namespace Nemundo\Webcam\Import;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Date\DateTimeDifference;
use Nemundo\Core\File\File;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Image\Cropping\ImageCropping;
use Nemundo\Core\Image\ImageFile;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Core\WebRequest\WebRequest;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Webcam\Config\WebcamConfig;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Data\Image\Image;
use Nemundo\Webcam\Data\Image\ImageCount;
use Nemundo\Webcam\Data\Webcam\WebcamRow;
use Nemundo\Webcam\Data\Webcam\WebcamUpdate;

class WebcamImageImport extends AbstractBase
{

    public function importImgae(WebcamRow $webcamRow)
    {

        $filename = (new TmpPath())
            ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))
            ->getFilename();

        $download = new WebRequest();
        $download->downloadUrl($webcamRow->imageUrl, $filename);

        $file = new File($filename);
        if ($file->fileExists()) {

            $hash = $file->getHash();

            $count = new ImageCount();
            $count->filter->andEqual($count->model->webcamId, $webcamRow->id);
            $count->filter->andEqual($count->model->hash, $hash);
            if ($count->getCount() == 0) {

                $imageFile = new ImageFile($filename);

                $squareFilename = (new TmpPath())
                    ->addPath('square_' . (new UniqueFilename())->getUniqueFilename('jpg'))
                    ->getFilename();

                $cropping = new ImageCropping();
                $cropping->sourceFilename = $filename;
                $cropping->destinationFilename = $squareFilename;
                $cropping->croppingDimension = $webcamRow->croppingImage->getCroppingDimension();
                $cropping->cropImage();

                $data = new Image();
                $data->webcamId = $webcamRow->id;
                $data->image->fromFilename($filename);
                $data->squareImage->fromFilename($squareFilename);
                $data->dateTime = (new DateTime())->setNow();
                $data->hash = $hash;
                $imageId = $data->save();

                $update = new WebcamUpdate();
                $update->active = true;
                $update->latestImageId = $imageId;
                $update->imageWidth = $imageFile->width;
                $update->imageHeight = $imageFile->height;
                $update->updateById($webcamRow->id);

                (new File($squareFilename))->deleteFile();

            }

            $file->deleteFile();

        }


        $webcamReloadRow = (new WebcamItem($webcamRow->id))->getDataRow();

        if ($webcamReloadRow->active) {

            $difference = new DateTimeDifference();
            $difference->dateFrom = $webcamReloadRow->latestImage->dateTime;
            $difference->dateUntil = (new DateTime())->setNow();

            if ($difference->getDifferenceInMinute() > WebcamConfig::$inactiveAfterMinute) {

                $update = new WebcamUpdate();
                $update->active = false;
                $update->updateById($webcamRow->id);

            }

        }

    }

}