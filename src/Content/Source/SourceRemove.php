<?php
namespace Nemundo\Webcam\Content\Source;
use Nemundo\Content\Type\AbstractContentRemove;
class SourceRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new SourceType();
}
protected function onDelete() {
}
}