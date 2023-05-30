<?php

namespace Nemundo\Webcam\Com\Carousel;

use Nemundo\Admin\Com\Carousel\AdminImageCarousel;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Webcam\Data\Image\ImageReader;

class WebcamImageCarousel extends AdminImageCarousel
{

    public $webcamId;

    public function getContent()
    {

        $reader = new ImageReader();
        $reader->filter->andEqual($reader->model->webcamId, $this->webcamId);
        $reader->addOrder($reader->model->id, SortOrder::DESCENDING);
        $reader->limit = 30;
        foreach ($reader->getData() as $imageRow) {
            //$this->addImage($imageRow->image->getUrl());
            $this->addImage($imageRow->squareImage->getImageUrl($reader->model->imageAutoSize500));
        }

        return parent::getContent();

    }

}