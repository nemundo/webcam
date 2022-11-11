<?php
namespace Nemundo\Webcam\Data\Image;
class Image extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ImageModel
*/
protected $model;

/**
* @var string
*/
public $webcamId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var \Nemundo\Model\Data\Property\File\ImageDataProperty
*/
public $image;

/**
* @var string
*/
public $hash;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
$this->image = new \Nemundo\Model\Data\Property\File\ImageDataProperty($this->model->image, $this->typeValueList);
}
public function save() {
$this->typeValueList->setModelValue($this->model->webcamId, $this->webcamId);
if ($this-> dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
$this->typeValueList->setModelValue($this->model->hash, $this->hash);
$id = parent::save();
return $id;
}
}