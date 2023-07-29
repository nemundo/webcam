<?php
namespace Nemundo\Webcam\Content\WebcamDelete;
use Nemundo\Content\Type\AbstractContentBuilder;
class WebcamDeleteBuilder extends AbstractContentBuilder {
protected function loadBuilder() {
$this->contentType = new WebcamDeleteType();
}
protected function onCreate() {
}
protected function onUpdate() {
}
}