<?php

namespace Nemundo\Webcam\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\Webcam\Reader\Region\RegionDataReader;

class RegionListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Region';

        $reader = new RegionDataReader();
        foreach ($reader->getData() as $regionRow) {
            $this->addItem($regionRow->id, $regionRow->region);
        }


        return parent::getContent();
    }
}