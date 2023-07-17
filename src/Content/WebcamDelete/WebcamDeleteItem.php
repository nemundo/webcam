<?php
namespace Nemundo\Webcam\Content\WebcamDelete;
use Nemundo\Content\Type\AbstractContentItem;
class WebcamDeleteItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new WebcamDeleteType();
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