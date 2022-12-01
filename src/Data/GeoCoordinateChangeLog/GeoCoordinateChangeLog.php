<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
class GeoCoordinateChangeLog extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var GeoCoordinateChangeLogModel
*/
protected $model;

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
public function save() {
if ($this-> geoCoordinateOld->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinateOld, $this->typeValueList);
$property->setValue($this->geoCoordinateOld);
}
if ($this-> geoCoordinateNew->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinateNew, $this->typeValueList);
$property->setValue($this->geoCoordinateNew);
}
$id = parent::save();
return $id;
}
}