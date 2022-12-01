<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class GeoCoordinateChangeLogId extends AbstractModelIdValue {
/**
* @var GeoCoordinateChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GeoCoordinateChangeLogModel();
}
}