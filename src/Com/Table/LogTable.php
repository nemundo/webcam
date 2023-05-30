<?php

namespace Nemundo\Webcam\Com\Table;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Webcam\Data\Log\LogReader;
use Nemundo\Webcam\Data\LogItem\LogItemReader;

class LogTable extends AdminTable
{

    public $webcamId;

    public function getContent()
    {

        $logReader = new LogReader();
        $logReader->model->loadUser();
        $logReader->filter->andEqual($logReader->model->webcamId,$this->webcamId);
        $logReader->addOrder($logReader->model->id);


        $header = new AdminTableHeader($this);
        $header->addText('Log');
        $header->addText($logReader->model->dateTime->label);
        $header->addText($logReader->model->user->label);



        foreach ($logReader->getData() as $logRow) {

            $row = new AdminTableRow($this);

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