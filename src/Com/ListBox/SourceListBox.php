<?php

namespace Nemundo\Webcam\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\Webcam\Reader\SourceDataReader;

class SourceListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Source';

        foreach ((new SourceDataReader())->getData() as $sourceRow) {
            $this->addItem($sourceRow->id,$sourceRow->source);
        }

        return parent::getContent();
    }
}