<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
class WebcamErfassungBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WebcamErfassungModel
*/
protected $model;

/**
* @var string
*/
public $webcam;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $imageUrl;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

public function __construct() {
parent::__construct();
$this->model = new WebcamErfassungModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function save() {
$this->typeValueList->setModelValue($this->model->webcam, $this->webcam);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
if ($this-> geoCoordinate->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
}
$id = parent::save();
return $id;
}
}