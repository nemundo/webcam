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
use Nemundo\Webcam\Com\Table\LogTable;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Data\Image\ImageReader;
use Nemundo\Webcam\Data\Log\LogReader;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Site\ImageDeleteSite;
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

        $table = new AdminLabelValueTable($layout);
        $table->addLabelValue($webcamRow->model->region->label, $webcamRow->region->region);
        $table->addLabelValue($webcamRow->model->source->label, $webcamRow->source->source);
        $table->addLabelHyperlink($webcamRow->model->imageUrl->label, $webcamRow->imageUrl);


        $dimension = $webcamRow->croppingImage->getCroppingDimension();

        $table->addLabelValue('x', $dimension->x);
        $table->addLabelValue('y', $dimension->x);
        $table->addLabelValue('width', $dimension->width);
        $table->addLabelValue('height', $dimension->height);


        $btn = new AdminIconSiteButton($layout);
        $btn->site = clone(ImageDeleteSite::$site);
        $btn->site->addParameter(new WebcamParameter());


        $table = new LogTable($layout);
        $table->webcamId= $webcamId;


        $carousel = new WebcamImageCarousel($layout);
        $carousel->webcamId = $webcamId;



        return parent::getContent();

    }
}