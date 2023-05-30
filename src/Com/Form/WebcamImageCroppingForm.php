<?php

namespace Nemundo\Webcam\Com\Form;

use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Package\CropperJs\CropperJs;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Data\Webcam\WebcamRow;
use Nemundo\Webcam\Data\Webcam\WebcamUpdate;
use Nemundo\Webcam\Import\WebcamImageImport;

class WebcamImageCroppingForm extends AbstractAdminForm
{

    /**
     * @var WebcamRow
     */
    public $webcamRow;

    /**
     * @var CropperJs
     */
    private $image;

    public function getContent()
    {

        $this->image = new CropperJs($this);
        $this->image->imageUrl = $this->webcamRow->latestImage->image->getUrl();
        $this->image->aspectRatioWidth = 16;
        $this->image->aspectRatioHeight = 9;
        $this->image->croppingDimension = $this->webcamRow->croppingImage->getCroppingDimension();
        /*$this->image->croppingDimension->width = $this->webcamRow->croppingImage->getCroppingDimension(); 400;
        $this->image->croppingDimension->height = 300;*/

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $update = new WebcamUpdate();
        $update->croppingImage->saveCroppingDimension($this->image->getCroppingDimension());
        $update->updateById($this->webcamRow->id);

        (new WebcamItem($this->webcamRow->id))
        ->deleteImage()
            ->importImage();


        /*$webcamRow = $webcamItem->getDataRow();
        (new WebcamImageImport())->importImgae($webcamRow);*/

    }

}