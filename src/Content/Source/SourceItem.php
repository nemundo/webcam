<?php

namespace Nemundo\Webcam\Content\Source;

use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\Webcam\Data\Source\SourceReader;
use Nemundo\Webcam\Data\Source\SourceRow;

class SourceItem extends AbstractContentItem
{
    protected function loadItem()
    {
        $this->contentType = new SourceType();
    }

    protected function onDataRow()
    {
        $this->dataRow = (new SourceReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|SourceRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}