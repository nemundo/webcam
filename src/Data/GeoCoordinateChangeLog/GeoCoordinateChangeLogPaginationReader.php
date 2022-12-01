<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
class GeoCoordinateChangeLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var GeoCoordinateChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoCoordinateChangeLogModel();
}
/**
* @return GeoCoordinateChangeLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new GeoCoordinateChangeLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}