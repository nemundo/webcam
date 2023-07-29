<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
class WebcamErfassungRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WebcamErfassungModel
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
* @var string
*/
public $imageUrl;

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
$this->imageUrl = $this->getModelValue($model->imageUrl);
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty($row, $model->geoCoordinate);
$this->geoCoordinate = $property->getValue();
}
}