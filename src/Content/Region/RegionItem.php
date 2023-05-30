<?php

namespace Nemundo\Webcam\Content\Region;

use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\Webcam\Data\Region\RegionReader;
use Nemundo\Webcam\Data\Region\RegionRow;

class RegionItem extends AbstractContentItem
{
    protected function loadItem()
    {
        $this->contentType = new RegionType();
    }

    protected function onDataRow()
    {

        $this->dataRow = (new RegionReader())->getRowById($this->dataId);

    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|RegionRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        return $this->getDataRow()->region;

    }

}