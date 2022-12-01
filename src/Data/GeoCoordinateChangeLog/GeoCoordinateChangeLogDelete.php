<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
class GeoCoordinateChangeLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var GeoCoordinateChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoCoordinateChangeLogModel();
}
}