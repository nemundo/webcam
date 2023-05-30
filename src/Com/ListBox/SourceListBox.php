<?php

namespace Nemundo\Webcam\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\Webcam\Parameter\SourceParameter;
use Nemundo\Webcam\Reader\Source\SourceDataReader;

class SourceListBox extends AdminListBox
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->name = (new SourceParameter())->getParameterName();

    }


    public function getContent()
    {

        $this->label = 'Source';

        foreach ((new SourceDataReader())->getData() as $sourceRow) {
            $this->addItem($sourceRow->id, $sourceRow->source);
        }

        return parent::getContent();
    }
}