<?php
namespace Nemundo\Webcam\Data\Webcam;
class WebcamExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WebcamModel::class;
$this->externalTableName = "webcam_webcam";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->webcam = new \Nemundo\Model\Type\Text\TextType();
$this->webcam->fieldName = "webcam";
$this->webcam->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->webcam->externalTableName = $this->externalTableName;
$this->webcam->aliasFieldName = $this->webcam->tableName . "_" . $this->webcam->fieldName;
$this->webcam->label = "Webcam";
$this->addType($this->webcam);

$this->description = new \Nemundo\Model\Type\Text\LargeTextType();
$this->description->fieldName = "description";
$this->description->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->description->externalTableName = $this->externalTableName;
$this->description->aliasFieldName = $this->description->tableName . "_" . $this->description->fieldName;
$this->description->label = "Description";
$this->addType($this->description);

$this->direction = new \Nemundo\Model\Type\Number\NumberType();
$this->direction->fieldName = "direction";
$this->direction->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->direction->externalTableName = $this->externalTableName;
$this->direction->aliasFieldName = $this->direction->tableName . "_" . $this->direction->fieldName;
$this->direction->label = "Direction";
$this->addType($this->direction);

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType();
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageUrl->externalTableName = $this->externalTableName;
$this->imageUrl->aliasFieldName = $this->imageUrl->tableName . "_" . $this->imageUrl->fieldName;
$this->imageUrl->label = "Image Url";
$this->addType($this->imageUrl);

$this->sourceId = new \Nemundo\Model\Type\Id\IdType();
$this->sourceId->fieldName = "source";
$this->sourceId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->sourceId->aliasFieldName = $this->sourceId->tableName ."_".$this->sourceId->fieldName;
$this->sourceId->label = "Source";
$this->addType($this->sourceId);

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType();
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->geoCoordinate->externalTableName = $this->externalTableName;
$this->geoCoordinate->aliasFieldName = $this->geoCoordinate->tableName . "_" . $this->geoCoordinate->fieldName;
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->createObject();
$this->addType($this->geoCoordinate);

$this->latestImageId = new \Nemundo\Model\Type\Id\IdType();
$this->latestImageId->fieldName = "latest_image";
$this->latestImageId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->latestImageId->aliasFieldName = $this->latestImageId->tableName ."_".$this->latestImageId->fieldName;
$this->latestImageId->label = "Latest Image";
$this->addType($this->latestImageId);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->externalTableName = $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->publicationStatusId = new \Nemundo\Model\Type\Id\IdType();
$this->publicationStatusId->fieldName = "publication_status";
$this->publicationStatusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->publicationStatusId->aliasFieldName = $this->publicationStatusId->tableName ."_".$this->publicationStatusId->fieldName;
$this->publicationStatusId->label = "Publication Status";
$this->addType($this->publicationStatusId);

$this->imageWidth = new \Nemundo\Model\Type\Number\NumberType();
$this->imageWidth->fieldName = "image_width";
$this->imageWidth->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageWidth->externalTableName = $this->externalTableName;
$this->imageWidth->aliasFieldName = $this->imageWidth->tableName . "_" . $this->imageWidth->fieldName;
$this->imageWidth->label = "Image Width";
$this->addType($this->imageWidth);

$this->imageHeight = new \Nemundo\Model\Type\Number\NumberType();
$this->imageHeight->fieldName = "image_height";
$this->imageHeight->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->imageHeight->externalTableName = $this->externalTableName;
$this->imageHeight->aliasFieldName = $this->imageHeight->tableName . "_" . $this->imageHeight->fieldName;
$this->imageHeight->label = "Image Height";
$this->addType($this->imageHeight);

$this->croppingImage = new \Nemundo\Model\Type\File\CroppingImageType();
$this->croppingImage->fieldName = "cropping_image";
$this->croppingImage->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->croppingImage->externalTableName = $this->externalTableName;
$this->croppingImage->aliasFieldName = $this->croppingImage->tableName . "_" . $this->croppingImage->fieldName;
$this->croppingImage->label = "Cropping Image";
$this->croppingImage->createObject();
$this->addType($this->croppingImage);

}
public function loadSource() {
if ($this->source == null) {
$this->source = new \Nemundo\Webcam\Data\Source\SourceExternalType(null, $this->parentFieldName . "_source");
$this->source->fieldName = "source";
$this->source->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->source->aliasFieldName = $this->source->tableName ."_".$this->source->fieldName;
$this->source->label = "Source";
$this->addType($this->source);
}
return $this;
}
public function loadLatestImage() {
if ($this->latestImage == null) {
$this->latestImage = new \Nemundo\Webcam\Data\Image\ImageExternalType(null, $this->parentFieldName . "_latest_image");
$this->latestImage->fieldName = "latest_image";
$this->latestImage->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->latestImage->aliasFieldName = $this->latestImage->tableName ."_".$this->latestImage->fieldName;
$this->latestImage->label = "Latest Image";
$this->addType($this->latestImage);
}
return $this;
}
public function loadPublicationStatus() {
if ($this->publicationStatus == null) {
$this->publicationStatus = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType(null, $this->parentFieldName . "_publication_status");
$this->publicationStatus->fieldName = "publication_status";
$this->publicationStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->publicationStatus->aliasFieldName = $this->publicationStatus->tableName ."_".$this->publicationStatus->fieldName;
$this->publicationStatus->label = "Publication Status";
$this->addType($this->publicationStatus);
}
return $this;
}
}