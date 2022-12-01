<?php
namespace Nemundo\Webcam\Data\LogItem;
class LogItemReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var LogItemModel
*/
public $model;

public function __construct() {
$this->model = new LogItemModel();
parent::__construct();
}
/**
* @return LogItemRow[]
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
* @return LogItemRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return LogItemRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new LogItemRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}