<?php
namespace Nemundo\Webcam\Data\GeoCoordinateChangeLog;
class GeoCoordinateChangeLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "webcam_geo_coordinate_change_log";
$this->aliasTableName = "webcam_geo_coordinate_change_log";
$this->label = "Geo Coordinate Change Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_geo_coordinate_change_log";
$this->id->externalTableName = "webcam_geo_coordinate_change_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_geo_coordinate_change_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->geoCoordinateOld = new \Nemundo\Model\Type\Geo\GeoCoordinateType($this);
$this->geoCoordinateOld->tableName = "webcam_geo_coordinate_change_log";
$this->geoCoordinateOld->externalTableName = "webcam_geo_coordinate_change_log";
$this->geoCoordinateOld->fieldName = "geo_coordinate_old";
$this->geoCoordinateOld->aliasFieldName = "webcam_geo_coordinate_change_log_geo_coordinate_old";
$this->geoCoordinateOld->label = "Geo Coordinate Old";
$this->geoCoordinateOld->allowNullValue = false;

$this->geoCoordinateNew = new \Nemundo\Model\Type\Geo\GeoCoordinateType($this);
$this->geoCoordinateNew->tableName = "webcam_geo_coordinate_change_log";
$this->geoCoordinateNew->externalTableName = "webcam_geo_coordinate_change_log";
$this->geoCoordinateNew->fieldName = "geo_coordinate_new";
$this->geoCoordinateNew->aliasFieldName = "webcam_geo_coordinate_change_log_geo_coordinate_new";
$this->geoCoordinateNew->label = "Geo Coordinate New";
$this->geoCoordinateNew->allowNullValue = false;

}
}