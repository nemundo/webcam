<?php
namespace Nemundo\Webcam\Content\WebcamErfassung;
use Nemundo\Content\Type\AbstractContentItem;
class WebcamErfassungItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new WebcamErfassungType();
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