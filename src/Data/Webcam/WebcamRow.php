<?php
namespace Nemundo\Webcam\Data\Webcam;
class WebcamRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebcamModel
*/
public $model;

/**
* @var string
*/
public $id;

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
* @var int
*/
public $sourceId;

/**
* @var \Nemundo\Webcam\Data\Source\SourceRow
*/
public $source;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

/**
* @var int
*/
public $latestImageId;

/**
* @var \Nemundo\Webcam\Data\Image\ImageRow
*/
public $latestImage;

/**
* @var bool
*/
public $active;

/**
* @var int
*/
public $publicationStatusId;

/**
* @var \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusRow
*/
public $publicationStatus;

/**
* @var int
*/
public $imageWidth;

/**
* @var int
*/
public $imageHeight;

/**
* @var \Nemundo\Model\Reader\Property\File\CroppingImageReaderProperty
*/
public $croppingImage;

/**
* @var int
*/
public $regionId;

/**
* @var \Nemundo\Webcam\Data\Region\RegionRow
*/
public $region;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->webcam = $this->getModelValue($model->webcam);
$this->description = $this->getModelValue($model->description);
$this->direction = intval($this->getModelValue($model->direction));
$this->imageUrl = $this->getModelValue($model->imageUrl);
$this->sourceId = intval($this->getModelValue($model->sourceId));
if ($model->source !== null) {
$this->loadNemundoWebcamDataSourceSourcesourceRow($model->source);
}
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty($row, $model->geoCoordinate);
$this->geoCoordinate = $property->getValue();
$this->latestImageId = intval($this->getModelValue($model->latestImageId));
if ($model->latestImage !== null) {
$this->loadNemundoWebcamDataImageImagelatestImageRow($model->latestImage);
}
$this->active = boolval($this->getModelValue($model->active));
$this->publicationStatusId = intval($this->getModelValue($model->publicationStatusId));
if ($model->publicationStatus !== null) {
$this->loadNemundoWebcamDataPublicationStatusPublicationStatuspublicationStatusRow($model->publicationStatus);
}
$this->imageWidth = intval($this->getModelValue($model->imageWidth));
$this->imageHeight = intval($this->getModelValue($model->imageHeight));
$this->croppingImage = new \Nemundo\Model\Reader\Property\File\CroppingImageReaderProperty($row, $model->croppingImage);
$this->regionId = intval($this->getModelValue($model->regionId));
if ($model->region !== null) {
$this->loadNemundoWebcamDataRegionRegionregionRow($model->region);
}
}
private function loadNemundoWebcamDataSourceSourcesourceRow($model) {
$this->source = new \Nemundo\Webcam\Data\Source\SourceRow($this->row, $model);
}
private function loadNemundoWebcamDataImageImagelatestImageRow($model) {
$this->latestImage = new \Nemundo\Webcam\Data\Image\ImageRow($this->row, $model);
}
private function loadNemundoWebcamDataPublicationStatusPublicationStatuspublicationStatusRow($model) {
$this->publicationStatus = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusRow($this->row, $model);
}
private function loadNemundoWebcamDataRegionRegionregionRow($model) {
$this->region = new \Nemundo\Webcam\Data\Region\RegionRow($this->row, $model);
}
}