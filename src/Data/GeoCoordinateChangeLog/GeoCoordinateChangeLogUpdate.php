<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class GeoCoordinateChangeLogUpdate extends AbstractModelUpdate {
/**
* @var GeoCoordinateChangeLogModel
*/
public $model;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinateOld;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinateNew;

public function __construct() {
parent::__construct();
$this->model = new GeoCoordinateChangeLogModel();
$this->geoCoordinateOld = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$this->geoCoordinateNew = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function update() {
if ($this-> geoCoordinateOld->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinateOld, $this->typeValueList);
$property->setValue($this->geoCoordinateOld);
}
if ($this-> geoCoordinateNew->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinateNew, $this->typeValueList);
$property->setValue($this->geoCoordinateNew);
}
parent::update();
}
}