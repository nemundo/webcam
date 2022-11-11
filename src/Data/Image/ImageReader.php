<?php
namespace Nemundo\Webcam\Data\Image;
class ImageReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ImageModel
*/
public $model;

public function __construct() {
$this->model = new ImageModel();
parent::__construct();
}
/**
* @return ImageRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return ImageRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ImageRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ImageRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}