<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
use Nemundo\Model\Data\AbstractModelUpdate;
class PublicationStatusUpdate extends AbstractModelUpdate {
/**
* @var PublicationStatusModel
*/
public $model;

/**
* @var string
*/
public $publicationStatus;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->publicationStatus, $this->publicationStatus);
parent::update();
}
}