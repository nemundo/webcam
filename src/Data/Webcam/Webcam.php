<?php
namespace Nemundo\Webcam\Data\Webcam;
class Webcam extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WebcamModel
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
* @var int
*/
public $direction;

/**
* @var string
*/
public $imageUrl;

/**
* @var string
*/
public $sourceId;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

/**
* @var string
*/
public $latestImageId;

/**
* @var bool
*/
public $active;

/**
* @var string
*/
public $publicationStatusId;

/**
* @var int
*/
public $imageWidth;

/**
* @var int
*/
public $imageHeight;

/**
* @var \Nemundo\Model\Data\Property\Image\CroppingImageDataProperty
*/
public $croppingImage;

/**
* @var string
*/
public $regionId;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
$this->croppingImage = new \Nemundo\Model\Data\Property\Image\CroppingImageDataProperty($this->model->croppingImage, $this->typeValueList);
}
public function save() {
$this->typeValueList->setModelValue($this->model->webcam, $this->webcam);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->direction, $this->direction);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
$this->typeValueList->setModelValue($this->model->sourceId, $this->sourceId);
if ($this-> geoCoordinate->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
}
$this->typeValueList->setModelValue($this->model->latestImageId, $this->latestImageId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->publicationStatusId, $this->publicationStatusId);
$this->typeValueList->setModelValue($this->model->imageWidth, $this->imageWidth);
$this->typeValueList->setModelValue($this->model->imageHeight, $this->imageHeight);
$this->typeValueList->setModelValue($this->model->regionId, $this->regionId);
$id = parent::save();
return $id;
}
}