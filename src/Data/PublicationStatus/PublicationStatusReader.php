<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatusReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PublicationStatusModel
*/
public $model;

public function __construct() {
$this->model = new PublicationStatusModel();
parent::__construct();
}
/**
* @return PublicationStatusRow[]
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
* @return PublicationStatusRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PublicationStatusRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PublicationStatusRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}