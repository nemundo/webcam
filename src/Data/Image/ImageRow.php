<?php
namespace Nemundo\Webcam\Data\Image;
class ImageRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ImageModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $webcamId;

/**
* @var \Nemundo\Webcam\Data\Webcam\WebcamRow
*/
public $webcam;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var \Nemundo\Model\Reader\Property\File\ImageReaderProperty
*/
public $image;

/**
* @var string
*/
public $hash;

/**
* @var \Nemundo\Model\Reader\Property\File\ImageReaderProperty
*/
public $squareImage;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->webcamId = intval($this->getModelValue($model->webcamId));
if ($model->webcam !== null) {
$this->loadNemundoWebcamDataWebcamWebcamwebcamRow($model->webcam);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->image = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->image);
$this->hash = $this->getModelValue($model->hash);
$this->squareImage = new \Nemundo\Model\Reader\Property\File\ImageReaderProperty($row, $model->squareImage);
}
private function loadNemundoWebcamDataWebcamWebcamwebcamRow($model) {
$this->webcam = new \Nemundo\Webcam\Data\Webcam\WebcamRow($this->row, $model);
}
}