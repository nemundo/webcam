<?php
namespace Nemundo\Webcam\Data\Webcam;
class WebcamModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $direction;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageUrl;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $sourceId;

/**
* @var \Nemundo\Webcam\Data\Source\SourceExternalType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $geoCoordinate;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $latestImageId;

/**
* @var \Nemundo\Webcam\Data\Image\ImageExternalType
*/
public $latestImage;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadModel() {
$this->tableName = "webcam_webcam";
$this->aliasTableName = "webcam_webcam";
$this->label = "Webcam";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_webcam";
$this->id->externalTableName = "webcam_webcam";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_webcam_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->webcam = new \Nemundo\Model\Type\Text\TextType($this);
$this->webcam->tableName = "webcam_webcam";
$this->webcam->externalTableName = "webcam_webcam";
$this->webcam->fieldName = "webcam";
$this->webcam->aliasFieldName = "webcam_webcam_webcam";
$this->webcam->label = "Webcam";
$this->webcam->allowNullValue = false;
$this->webcam->length = 255;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "webcam_webcam";
$this->description->externalTableName = "webcam_webcam";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "webcam_webcam_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->direction = new \Nemundo\Model\Type\Number\NumberType($this);
$this->direction->tableName = "webcam_webcam";
$this->direction->externalTableName = "webcam_webcam";
$this->direction->fieldName = "direction";
$this->direction->aliasFieldName = "webcam_webcam_direction";
$this->direction->label = "Direction";
$this->direction->allowNullValue = false;

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageUrl->tableName = "webcam_webcam";
$this->imageUrl->externalTableName = "webcam_webcam";
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->aliasFieldName = "webcam_webcam_image_url";
$this->imageUrl->label = "Image Url";
$this->imageUrl->allowNullValue = false;
$this->imageUrl->length = 255;

$this->sourceId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->sourceId->tableName = "webcam_webcam";
$this->sourceId->fieldName = "source";
$this->sourceId->aliasFieldName = "webcam_webcam_source";
$this->sourceId->label = "Source";
$this->sourceId->allowNullValue = false;

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType($this);
$this->geoCoordinate->tableName = "webcam_webcam";
$this->geoCoordinate->externalTableName = "webcam_webcam";
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->aliasFieldName = "webcam_webcam_geo_coordinate";
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->allowNullValue = false;

$this->latestImageId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->latestImageId->tableName = "webcam_webcam";
$this->latestImageId->fieldName = "latest_image";
$this->latestImageId->aliasFieldName = "webcam_webcam_latest_image";
$this->latestImageId->label = "Latest Image";
$this->latestImageId->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "webcam_webcam";
$this->active->externalTableName = "webcam_webcam";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "webcam_webcam_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "image_url";
$index->addType($this->imageUrl);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "active_webcam";
$index->addType($this->active);
$index->addType($this->webcam);

}
public function loadSource() {
if ($this->source == null) {
$this->source = new \Nemundo\Webcam\Data\Source\SourceExternalType($this, "webcam_webcam_source");
$this->source->tableName = "webcam_webcam";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "webcam_webcam_source";
$this->source->label = "Source";
}
return $this;
}
public function loadLatestImage() {
if ($this->latestImage == null) {
$this->latestImage = new \Nemundo\Webcam\Data\Image\ImageExternalType($this, "webcam_webcam_latest_image");
$this->latestImage->tableName = "webcam_webcam";
$this->latestImage->fieldName = "latest_image";
$this->latestImage->aliasFieldName = "webcam_webcam_latest_image";
$this->latestImage->label = "Latest Image";
}
return $this;
}
}