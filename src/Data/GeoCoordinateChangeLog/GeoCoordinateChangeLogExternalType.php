<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
class GeoCoordinateChangeLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $geoCoordinateOld;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $geoCoordinateNew;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = GeoCoordinateChangeLogModel::class;
$this->externalTableName = "webcam_geo_coordinate_change_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->geoCoordinateOld = new \Nemundo\Model\Type\Geo\GeoCoordinateType();
$this->geoCoordinateOld->fieldName = "geo_coordinate_old";
$this->geoCoordinateOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->geoCoordinateOld->externalTableName = $this->externalTableName;
$this->geoCoordinateOld->aliasFieldName = $this->geoCoordinateOld->tableName . "_" . $this->geoCoordinateOld->fieldName;
$this->geoCoordinateOld->label = "Geo Coordinate Old";
$this->geoCoordinateOld->createObject();
$this->addType($this->geoCoordinateOld);

$this->geoCoordinateNew = new \Nemundo\Model\Type\Geo\GeoCoordinateType();
$this->geoCoordinateNew->fieldName = "geo_coordinate_new";
$this->geoCoordinateNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->geoCoordinateNew->externalTableName = $this->externalTableName;
$this->geoCoordinateNew->aliasFieldName = $this->geoCoordinateNew->tableName . "_" . $this->geoCoordinateNew->fieldName;
$this->geoCoordinateNew->label = "Geo Coordinate New";
$this->geoCoordinateNew->createObject();
$this->addType($this->geoCoordinateNew);

}
}