<?php
namespace Nemundo\Webcam\Data\LogItem;
class LogItemRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LogItemModel
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
public $logTypeId;

/**
* @var \Nemundo\Webcam\Data\LogType\LogTypeRow
*/
public $logType;

/**
* @var int
*/
public $dataId;

/**
* @var string
*/
public $text;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->logId = intval($this->getModelValue($model->logId));
if ($model->log !== null) {
$this->loadNemundoWebcamDataLogLoglogRow($model->log);
}
$this->logTypeId = intval($this->getModelValue($model->logTypeId));
if ($model->logType !== null) {
$this->loadNemundoWebcamDataLogTypeLogTypelogTypeRow($model->logType);
}
$this->dataId = intval($this->getModelValue($model->dataId));
$this->text = $this->getModelValue($model->text);
}
private function loadNemundoWebcamDataLogLoglogRow($model) {
$this->log = new \Nemundo\Webcam\Data\Log\LogRow($this->row, $model);
}
private function loadNemundoWebcamDataLogTypeLogTypelogTypeRow($model) {
$this->logType = new \Nemundo\Webcam\Data\LogType\LogTypeRow($this->row, $model);
}
}