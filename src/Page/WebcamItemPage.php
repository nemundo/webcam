<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Carousel\AdminImageCarousel;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Webcam\Com\Carousel\WebcamImageCarousel;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Data\Image\ImageReader;
use Nemundo\Webcam\Data\Log\LogReader;
use Nemundo\Webcam\Parameter\WebcamParameter;

class WebcamItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $webcamId = (new WebcamParameter())->getValue();
        $webcamItem = new WebcamItem($webcamId);

        $layout = new AdminFlexboxLayout($this);

        $title = new AdminTitle($layout);
        $title->content = $webcamItem->getSubject();


        $carousel = new WebcamImageCarousel($layout);
        $carousel->webcamId = $webcamId;


        /*$table = new AdminTable($layout);


        $reader = new LogReader();
        $reader->model->loadUser();
        $reader->filter->andEqual($reader->model->webcamId, $webcamId);

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->user->label);
        $header->addText($reader->model->dateTime->label);

        foreach ($reader->getData() as $logRow) {

            $row = new AdminTableRow($table);
            $row->addText($logRow->user->displayName);
            $row->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());

        }*/









        /*$carousel = new WebcamImageCarousel($layout);
        $carousel->webcamId = $webcamId;


        /*$carousel = new AdminImageCarousel($layout);
        //$carousel->slideEffect = false;

        $reader = new ImageReader();  // $webcamContentType->getWebcamImageReader();
        $reader->filter->andEqual($reader->model->webcamId, $webcamId);
        $reader->addOrder($reader->model->id, SortOrder::DESCENDING);
        $reader->limit = 30;
        foreach ($reader->getData() as $imageRow) {

            $carousel->addImage($imageRow->image->getUrl());

            //$row = new AdminTableRow($table);

            /*$row->addText($imageRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($imageRow->image->getUrl());*/

            /*$img = new AdminImage($row);
            $img->src = $imageRow->image->getUrl();*/

        //}

        return parent::getContent();

    }
}