<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
class GeoCoordinateChangeLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var GeoCoordinateChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoCoordinateChangeLogModel();
}
}