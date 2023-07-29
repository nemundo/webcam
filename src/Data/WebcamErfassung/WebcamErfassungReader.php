<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
class WebcamErfassungReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebcamErfassungModel
*/
public $model;

public function __construct() {
$this->model = new WebcamErfassungModel();
parent::__construct();
}
/**
* @return WebcamErfassungRow[]
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
* @return WebcamErfassungRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebcamErfassungRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebcamErfassungRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}