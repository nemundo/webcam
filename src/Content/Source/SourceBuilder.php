<?php

namespace Nemundo\Webcam\Content\Source;

use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\Webcam\Data\Source\Source;
use Nemundo\Webcam\Data\Source\SourceUpdate;

class SourceBuilder extends AbstractContentBuilder
{

    public $source;

    public $sourceUrl;

    protected function loadBuilder()
    {
        $this->contentType = new SourceType();
    }

    protected function onCreate()
    {

        $data = new Source();
        $data->source = $this->source;
        $data->hasUrl = $this->hasSourceUrl();
        $data->url = $this->sourceUrl;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

        $update = new SourceUpdate();
        $update->source = $this->source;
        $update->hasUrl = $this->hasSourceUrl();
        $update->url = $this->sourceUrl;
        $update->updateById($this->dataId);

    }


    private function hasSourceUrl() {

        $hasUrl = false;
        if (($this->sourceUrl !== '') && ($this->sourceUrl !== null)) {
            $hasUrl = true;
        }

        return $hasUrl;

    }


}