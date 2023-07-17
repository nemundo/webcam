<?php
namespace Nemundo\Webcam\Content\WebcamPublish;
use Nemundo\Content\Type\AbstractContentBuilder;
class WebcamPublishBuilder extends AbstractContentBuilder {
protected function loadBuilder() {
$this->contentType = new WebcamPublishType();
}
protected function onCreate() {
}
protected function onUpdate() {
}
}