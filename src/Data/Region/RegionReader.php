<?php
namespace Nemundo\Webcam\Data\Region;
class RegionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var RegionModel
*/
public $model;

public function __construct() {
$this->model = new RegionModel();
parent::__construct();
}
/**
* @return RegionRow[]
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
* @return RegionRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return RegionRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new RegionRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}