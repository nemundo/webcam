<?php
namespace Nemundo\Webcam\Data\Region;
class RegionPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var RegionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionModel();
}
/**
* @return RegionRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new RegionRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}