<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatus extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PublicationStatusModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $publicationStatus;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->publicationStatus, $this->publicationStatus);
$id = parent::save();
return $id;
}
}