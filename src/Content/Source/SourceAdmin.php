<?php

namespace Nemundo\Webcam\Content\Source;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Webcam\Data\Source\SourceReader;

class SourceAdmin extends AbstractContentAdmin
{

    protected function onIndex()
    {

        $table = new AdminTable($this);

        $sourceReader = new SourceReader();

        $header = new AdminTableHeader($table);
        $header->addText($sourceReader->model->source->label);
        $header->addText($sourceReader->model->url->label);


        foreach ($sourceReader->getData() as $sourceRow) {

            $row = new AdminTableRow($table);
            $row->addText($sourceRow->source);
            $row->addText($sourceRow->url);
            $row->addIconActionSite($this->getEditSite($sourceRow->id));

        }


    }


}