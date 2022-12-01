<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PublicationStatusLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $logId;

/**
* @var \Nemundo\Webcam\Data\Log\LogRow
*/
public $log;

/**
* @var int
*/
public $publicationStatusOldId;

/**
* @var \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusRow
*/
public $publicationStatusOld;

/**
* @var int
*/
public $publicationStatusNewId;

/**
* @var \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusRow
*/
public $publicationStatusNew;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->logId = intval($this->getModelValue($model->logId));
if ($model->log !== null) {
$this->loadNemundoWebcamDataLogLoglogRow($model->log);
}
$this->publicationStatusOldId = intval($this->getModelValue($model->publicationStatusOldId));
if ($model->publicationStatusOld !== null) {
$this->loadNemundoWebcamDataPublicationStatusPublicationStatuspublicationStatusOldRow($model->publicationStatusOld);
}
$this->publicationStatusNewId = intval($this->getModelValue($model->publicationStatusNewId));
if ($model->publicationStatusNew !== null) {
$this->loadNemundoWebcamDataPublicationStatusPublicationStatuspublicationStatusNewRow($model->publicationStatusNew);
}
}
private function loadNemundoWebcamDataLogLoglogRow($model) {
$this->log = new \Nemundo\Webcam\Data\Log\LogRow($this->row, $model);
}
private function loadNemundoWebcamDataPublicationStatusPublicationStatuspublicationStatusOldRow($model) {
$this->publicationStatusOld = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusRow($this->row, $model);
}
private function loadNemundoWebcamDataPublicationStatusPublicationStatuspublicationStatusNewRow($model) {
$this->publicationStatusNew = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusRow($this->row, $model);
}
}