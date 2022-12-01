<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
class GeoCoordinateChangeLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var GeoCoordinateChangeLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinateOld;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinateNew;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty($row, $model->geoCoordinateOld);
$this->geoCoordinateOld = $property->getValue();
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty($row, $model->geoCoordinateNew);
$this->geoCoordinateNew = $property->getValue();
}
}