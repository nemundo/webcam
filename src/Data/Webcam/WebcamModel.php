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

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $publicationStatusId;

/**
* @var \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType
*/
public $publicationStatus;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $imageWidth;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $imageHeight;

/**
* @var \Nemundo\Model\Type\File\CroppingImageType
*/
public $croppingImage;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $regionId;

/**
* @var \Nemundo\Webcam\Data\Region\RegionExternalType
*/
public $region;

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

$this->publicationStatusId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->publicationStatusId->tableName = "webcam_webcam";
$this->publicationStatusId->fieldName = "publication_status";
$this->publicationStatusId->aliasFieldName = "webcam_webcam_publication_status";
$this->publicationStatusId->label = "Publication Status";
$this->publicationStatusId->allowNullValue = false;

$this->imageWidth = new \Nemundo\Model\Type\Number\NumberType($this);
$this->imageWidth->tableName = "webcam_webcam";
$this->imageWidth->externalTableName = "webcam_webcam";
$this->imageWidth->fieldName = "image_width";
$this->imageWidth->aliasFieldName = "webcam_webcam_image_width";
$this->imageWidth->label = "Image Width";
$this->imageWidth->allowNullValue = false;

$this->imageHeight = new \Nemundo\Model\Type\Number\NumberType($this);
$this->imageHeight->tableName = "webcam_webcam";
$this->imageHeight->externalTableName = "webcam_webcam";
$this->imageHeight->fieldName = "image_height";
$this->imageHeight->aliasFieldName = "webcam_webcam_image_height";
$this->imageHeight->label = "Image Height";
$this->imageHeight->allowNullValue = false;

$this->croppingImage = new \Nemundo\Model\Type\File\CroppingImageType($this);
$this->croppingImage->tableName = "webcam_webcam";
$this->croppingImage->externalTableName = "webcam_webcam";
$this->croppingImage->fieldName = "cropping_image";
$this->croppingImage->aliasFieldName = "webcam_webcam_cropping_image";
$this->croppingImage->label = "Cropping Image";
$this->croppingImage->allowNullValue = false;

$this->regionId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->regionId->tableName = "webcam_webcam";
$this->regionId->fieldName = "region";
$this->regionId->aliasFieldName = "webcam_webcam_region";
$this->regionId->label = "Region";
$this->regionId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "image_url";
$index->addType($this->imageUrl);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "active_webcam";
$index->addType($this->active);
$index->addType($this->webcam);

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "region";
$index->addType($this->regionId);
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
public function loadPublicationStatus() {
if ($this->publicationStatus == null) {
$this->publicationStatus = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType($this, "webcam_webcam_publication_status");
$this->publicationStatus->tableName = "webcam_webcam";
$this->publicationStatus->fieldName = "publication_status";
$this->publicationStatus->aliasFieldName = "webcam_webcam_publication_status";
$this->publicationStatus->label = "Publication Status";
}
return $this;
}
public function loadRegion() {
if ($this->region == null) {
$this->region = new \Nemundo\Webcam\Data\Region\RegionExternalType($this, "webcam_webcam_region");
$this->region->tableName = "webcam_webcam";
$this->region->fieldName = "region";
$this->region->aliasFieldName = "webcam_webcam_region";
$this->region->label = "Region";
}
return $this;
}
}