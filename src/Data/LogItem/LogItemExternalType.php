<?php
namespace Nemundo\Webcam\Data\LogItem;
class LogItemExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $logId;

/**
* @var \Nemundo\Webcam\Data\Log\LogExternalType
*/
public $log;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $logTypeId;

/**
* @var \Nemundo\Webcam\Data\LogType\LogTypeExternalType
*/
public $logType;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $dataId;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LogItemModel::class;
$this->externalTableName = "webcam_log_item";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->logId = new \Nemundo\Model\Type\Id\IdType();
$this->logId->fieldName = "log";
$this->logId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logId->aliasFieldName = $this->logId->tableName ."_".$this->logId->fieldName;
$this->logId->label = "Log";
$this->addType($this->logId);

$this->logTypeId = new \Nemundo\Model\Type\Id\IdType();
$this->logTypeId->fieldName = "log_type";
$this->logTypeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logTypeId->aliasFieldName = $this->logTypeId->tableName ."_".$this->logTypeId->fieldName;
$this->logTypeId->label = "Log Type";
$this->addType($this->logTypeId);

$this->dataId = new \Nemundo\Model\Type\Number\NumberType();
$this->dataId->fieldName = "data_id";
$this->dataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dataId->externalTableName = $this->externalTableName;
$this->dataId->aliasFieldName = $this->dataId->tableName . "_" . $this->dataId->fieldName;
$this->dataId->label = "Data Id";
$this->addType($this->dataId);

$this->text = new \Nemundo\Model\Type\Text\LargeTextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->externalTableName = $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

}
public function loadLog() {
if ($this->log == null) {
$this->log = new \Nemundo\Webcam\Data\Log\LogExternalType(null, $this->parentFieldName . "_log");
$this->log->fieldName = "log";
$this->log->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->log->aliasFieldName = $this->log->tableName ."_".$this->log->fieldName;
$this->log->label = "Log";
$this->addType($this->log);
}
return $this;
}
public function loadLogType() {
if ($this->logType == null) {
$this->logType = new \Nemundo\Webcam\Data\LogType\LogTypeExternalType(null, $this->parentFieldName . "_log_type");
$this->logType->fieldName = "log_type";
$this->logType->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logType->aliasFieldName = $this->logType->tableName ."_".$this->logType->fieldName;
$this->logType->label = "Log Type";
$this->addType($this->logType);
}
return $this;
}
}