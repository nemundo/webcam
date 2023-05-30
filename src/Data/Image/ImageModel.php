<?php
namespace Nemundo\Webcam\Data\Image;
class ImageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $imageAutoSize500;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $hash;

/**
* @var \Nemundo\Model\Type\File\ImageType
*/
public $squareImage;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $squareImageAutoSize500;

/**
* @var \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat
*/
public $squareImageAutoSize1500;

protected function loadModel() {
$this->tableName = "webcam_image";
$this->aliasTableName = "webcam_image";
$this->label = "Image";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_image";
$this->id->externalTableName = "webcam_image";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_image_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->webcamId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->webcamId->tableName = "webcam_image";
$this->webcamId->fieldName = "webcam";
$this->webcamId->aliasFieldName = "webcam_image_webcam";
$this->webcamId->label = "Webcam";
$this->webcamId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "webcam_image";
$this->dateTime->externalTableName = "webcam_image";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "webcam_image_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->image = new \Nemundo\Model\Type\File\ImageType($this);
$this->image->tableName = "webcam_image";
$this->image->externalTableName = "webcam_image";
$this->image->fieldName = "image";
$this->image->aliasFieldName = "webcam_image_image";
$this->image->label = "Image";
$this->image->allowNullValue = false;
$this->imageAutoSize500 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->image);
$this->imageAutoSize500->size = 500;

$this->hash = new \Nemundo\Model\Type\Text\TextType($this);
$this->hash->tableName = "webcam_image";
$this->hash->externalTableName = "webcam_image";
$this->hash->fieldName = "hash";
$this->hash->aliasFieldName = "webcam_image_hash";
$this->hash->label = "Hash";
$this->hash->allowNullValue = false;
$this->hash->length = 255;

$this->squareImage = new \Nemundo\Model\Type\File\ImageType($this);
$this->squareImage->tableName = "webcam_image";
$this->squareImage->externalTableName = "webcam_image";
$this->squareImage->fieldName = "square_image";
$this->squareImage->aliasFieldName = "webcam_image_square_image";
$this->squareImage->label = "Square Image";
$this->squareImage->allowNullValue = false;
$this->squareImageAutoSize500 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->squareImage);
$this->squareImageAutoSize500->size = 500;
$this->squareImageAutoSize1500 = new \Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat($this->squareImage);
$this->squareImageAutoSize1500->size = 1500;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "webcam_hash";
$index->addType($this->webcamId);
$index->addType($this->hash);

}
public function loadWebcam() {
if ($this->webcam == null) {
$this->webcam = new \Nemundo\Webcam\Data\Webcam\WebcamExternalType($this, "webcam_image_webcam");
$this->webcam->tableName = "webcam_image";
$this->webcam->fieldName = "webcam";
$this->webcam->aliasFieldName = "webcam_image_webcam";
$this->webcam->label = "Webcam";
}
return $this;
}
}