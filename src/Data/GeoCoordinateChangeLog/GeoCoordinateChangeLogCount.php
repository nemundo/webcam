<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
class GeoCoordinateChangeLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var GeoCoordinateChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoCoordinateChangeLogModel();
}
}