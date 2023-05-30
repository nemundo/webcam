<?php
namespace Nemundo\Webcam\Content\Region;
use Nemundo\Content\Type\AbstractContentRemove;
class RegionRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new RegionType();
}
protected function onDelete() {
}
}