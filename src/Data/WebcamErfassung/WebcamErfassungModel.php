<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
class WebcamErfassungModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $webcam;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageUrl;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $geoCoordinate;

protected function loadModel() {
$this->tableName = "webcam_webcam_erfassung";
$this->aliasTableName = "webcam_webcam_erfassung";
$this->label = "Webcam Erfassung";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_webcam_erfassung";
$this->id->externalTableName = "webcam_webcam_erfassung";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_webcam_erfassung_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->webcam = new \Nemundo\Model\Type\Text\TextType($this);
$this->webcam->tableName = "webcam_webcam_erfassung";
$this->webcam->externalTableName = "webcam_webcam_erfassung";
$this->webcam->fieldName = "webcam";
$this->webcam->aliasFieldName = "webcam_webcam_erfassung_webcam";
$this->webcam->label = "Webcam";
$this->webcam->allowNullValue = false;
$this->webcam->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "webcam_webcam_erfassung";
$this->description->externalTableName = "webcam_webcam_erfassung";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "webcam_webcam_erfassung_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageUrl->tableName = "webcam_webcam_erfassung";
$this->imageUrl->externalTableName = "webcam_webcam_erfassung";
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->aliasFieldName = "webcam_webcam_erfassung_image_url";
$this->imageUrl->label = "Image Url";
$this->imageUrl->allowNullValue = false;
$this->imageUrl->length = 255;

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType($this);
$this->geoCoordinate->tableName = "webcam_webcam_erfassung";
$this->geoCoordinate->externalTableName = "webcam_webcam_erfassung";
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->aliasFieldName = "webcam_webcam_erfassung_geo_coordinate";
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->allowNullValue = false;

}
}