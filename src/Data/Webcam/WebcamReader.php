<?php
namespace Nemundo\Webcam\Data\Webcam;
class WebcamReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebcamModel
*/
public $model;

public function __construct() {
$this->model = new WebcamModel();
parent::__construct();
}
/**
* @return WebcamRow[]
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
* @return WebcamRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebcamRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebcamRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}