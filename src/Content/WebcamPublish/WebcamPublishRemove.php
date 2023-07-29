<?php
namespace Nemundo\Webcam\Content\WebcamPublish;
use Nemundo\Content\Type\AbstractContentRemove;
class WebcamPublishRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new WebcamPublishType();
}
protected function onDelete() {
}
}