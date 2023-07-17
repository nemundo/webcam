<?php
namespace Nemundo\Webcam\Content\WebcamErfassung;
use Nemundo\Content\Type\AbstractContentRemove;
class WebcamErfassungRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new WebcamErfassungType();
}
protected function onDelete() {
}
}