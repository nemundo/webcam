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
}
private function loadNemundoWebcamDataSourceSourcesourceRow($model) {
$this->source = new \Nemundo\Webcam\Data\Source\SourceRow($this->row, $model);
}
}