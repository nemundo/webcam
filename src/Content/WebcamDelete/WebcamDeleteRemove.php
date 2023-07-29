<?php
namespace Nemundo\Webcam\Content\WebcamDelete;
use Nemundo\Content\Type\AbstractContentRemove;
class WebcamDeleteRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new WebcamDeleteType();
}
protected function onDelete() {
}
}