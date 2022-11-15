<?php
namespace Nemundo\Webcam\Data\TextLog;
class TextLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TextLogModel
*/
public $model;

public function __construct() {
$this->model = new TextLogModel();
parent::__construct();
}
/**
* @return TextLogRow[]
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
* @return TextLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TextLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TextLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}