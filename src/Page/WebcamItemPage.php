<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Carousel\AdminImageCarousel;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Webcam\Com\Carousel\WebcamImageCarousel;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Data\Image\ImageReader;
use Nemundo\Webcam\Data\Log\LogReader;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Site\Workflow\SendWorkflowMailSite;

class WebcamItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $webcamId = (new WebcamParameter())->getValue();
        $webcamItem = new WebcamItem($webcamId);
        $webcamRow = $webcamItem->getDataRow();

        $layout = new AdminFlexboxLayout($this);
        new WebcamTab($layout);



        $title = new AdminTitle($layout);
        $title->content = $webcamItem->getSubject();






        /*$btn = new AdminIconSiteButton($layout);
$btn->site = $webcamRow->get*/


        $table = new AdminLabelValueTable($layout);
        $table->addLabelValue($webcamRow->model->region->label, $webcamRow->webcam);


        $dimension = $webcamRow->croppingImage->getCroppingDimension();

        $table->addLabelValue('x', $dimension->x);
        $table->addLabelValue('y', $dimension->x);
        $table->addLabelValue('width', $dimension->width);
        $table->addLabelValue('height', $dimension->height);





        /*$cropping = [];
        $cropping['x']= $dimension->x;
        $cropping['y']= $dimension->y;
        $cropping['width']= $dimension->width;
        $cropping['height']= $dimension->height;*/





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