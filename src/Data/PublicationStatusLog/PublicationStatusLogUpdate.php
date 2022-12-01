<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class PublicationStatusLogUpdate extends AbstractModelUpdate {
/**
* @var PublicationStatusLogModel
*/
public $model;

/**
* @var string
*/
public $logId;

/**
* @var string
*/
public $publicationStatusOldId;

/**
* @var string
*/
public $publicationStatusNewId;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusLogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$this->typeValueList->setModelValue($this->model->publicationStatusOldId, $this->publicationStatusOldId);
$this->typeValueList->setModelValue($this->model->publicationStatusNewId, $this->publicationStatusNewId);
parent::update();
}
}