<?php
namespace Nemundo\Webcam\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WebcamModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Webcam\Data\Image\ImageModel());
$this->addModel(new \Nemundo\Webcam\Data\Source\SourceModel());
$this->addModel(new \Nemundo\Webcam\Data\Webcam\WebcamModel());
}
}