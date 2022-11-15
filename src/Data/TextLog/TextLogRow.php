<?php
namespace Nemundo\Webcam\Data\TextLog;
class TextLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TextLogModel
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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->logId = intval($this->getModelValue($model->logId));
if ($model->log !== null) {
$this->loadNemundoWebcamDataLogLoglogRow($model->log);
}
}
private function loadNemundoWebcamDataLogLoglogRow($model) {
$this->log = new \Nemundo\Webcam\Data\Log\LogRow($this->row, $model);
}
}