<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Data\Log\LogReader;
use Nemundo\Webcam\Data\LogItem\LogItemReader;
use Nemundo\Webcam\Parameter\WebcamParameter;

class WebcamLogPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);

        $webcamId = (new WebcamParameter())->getValue();
        $webcamRow = (new WebcamItem($webcamId))->getDataRow();

        $title = new AdminTitle($layout);
        $title->content = $webcamRow->webcam;


        $table = new AdminTable($layout);

        $logReader = new LogReader();
        $logReader->model->loadUser();
        $logReader->filter->andEqual($logReader->model->webcamId,$webcamId);
        $logReader->addOrder($logReader->model->id);


        $header = new AdminTableHeader($table);
        $header->addText('Log');
        $header->addText($logReader->model->dateTime->label);
        $header->addText($logReader->model->user->label);



        foreach ($logReader->getData() as $logRow) {

            $row = new AdminTableRow($table);

            $ul = new UnorderedList($row);

            $logItemReader = new LogItemReader();
            $logItemReader->filter->andEqual($logItemReader->model->logId, $logRow->id);
            foreach ($logItemReader->getData() as $logItemRow) {
                $ul->addText($logItemRow->text);
            }

            $row->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($logRow->user->displayName);

        }




        return parent::getContent();

    }
}