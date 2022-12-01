<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
class TextChangeLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var TextChangeLogModel
*/
public $model;

public function __construct() {
$this->model = new TextChangeLogModel();
parent::__construct();
}
/**
* @return TextChangeLogRow[]
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
* @return TextChangeLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TextChangeLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TextChangeLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}