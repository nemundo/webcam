<?php

namespace Nemundo\Webcam\Content\Region;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Webcam\Data\Source\SourceReader;
use Nemundo\Webcam\Reader\Region\RegionDataReader;

class RegionAdmin extends AbstractContentAdmin
{

    protected function onIndex()
    {

        $table = new AdminTable($this);

        $regionReader = new RegionDataReader();

        $header = new AdminTableHeader($table);
        $header->addText($regionReader->model->region->label);
        $header->addEmpty();

        foreach ($regionReader->getData() as $regionRow) {

            $row = new AdminTableRow($table);
            $row->addText($regionRow->region);
            $row->addIconActionSite($this->getEditSite($regionRow->id));

        }


    }

}