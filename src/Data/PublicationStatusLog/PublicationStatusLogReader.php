<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PublicationStatusLogModel
*/
public $model;

public function __construct() {
$this->model = new PublicationStatusLogModel();
parent::__construct();
}
/**
* @return PublicationStatusLogRow[]
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
* @return PublicationStatusLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PublicationStatusLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PublicationStatusLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}