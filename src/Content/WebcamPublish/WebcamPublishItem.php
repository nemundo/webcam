<?php
namespace Nemundo\Webcam\Content\WebcamPublish;
use Nemundo\Content\Type\AbstractContentItem;
class WebcamPublishItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new WebcamPublishType();
}
protected function onDataRow() {
}
/**
* @return \Nemundo\Model\Row\AbstractModelDataRow
*/
public function getDataRow() {
return parent::getDataRow(); 
}
}