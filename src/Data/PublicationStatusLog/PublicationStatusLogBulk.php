<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var PublicationStatusLogModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$this->typeValueList->setModelValue($this->model->publicationStatusOldId, $this->publicationStatusOldId);
$this->typeValueList->setModelValue($this->model->publicationStatusNewId, $this->publicationStatusNewId);
$id = parent::save();
return $id;
}
}