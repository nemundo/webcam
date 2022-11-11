<?php
namespace Nemundo\Webcam\Data\Image;
class ImageExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $webcamId;

/**
* @var \Nemundo\Webcam\Data\Webcam\WebcamExternalType
*/
public $webcam;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $image;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $hash;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ImageModel::class;
$this->externalTableName = "webcam_image";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->webcamId = new \Nemundo\Model\Type\Id\IdType();
$this->webcamId->fieldName = "webcam";
$this->webcamId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->webcamId->aliasFieldName = $this->webcamId->tableName ."_".$this->webcamId->fieldName;
$this->webcamId->label = "Webcam";
$this->addType($this->webcamId);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->image = new \Nemundo\Model\Type\File\ImageType();
$this->image->fieldName = "image";
$this->image->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->image->externalTableName = $this->externalTableName;
$this->image->aliasFieldName = $this->image->tableName . "_" . $this->image->fieldName;
$this->image->label = "Image";
$this->addType($this->image);

$this->hash = new \Nemundo\Model\Type\Text\TextType();
$this->hash->fieldName = "hash";
$this->hash->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hash->externalTableName = $this->externalTableName;
$this->hash->aliasFieldName = $this->hash->tableName . "_" . $this->hash->fieldName;
$this->hash->label = "Hash";
$this->addType($this->hash);

}
public function loadWebcam() {
if ($this->webcam == null) {
$this->webcam = new \Nemundo\Webcam\Data\Webcam\WebcamExternalType(null, $this->parentFieldName . "_webcam");
$this->webcam->fieldName = "webcam";
$this->webcam->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->webcam->aliasFieldName = $this->webcam->tableName ."_".$this->webcam->fieldName;
$this->webcam->label = "Webcam";
$this->addType($this->webcam);
}
return $this;
}
}