<?php
namespace Nemundo\Webcam\Data\LogItem;
class LogItemModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $logId;

/**
* @var \Nemundo\Webcam\Data\Log\LogExternalType
*/
public $log;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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

protected function loadModel() {
$this->tableName = "webcam_log_item";
$this->aliasTableName = "webcam_log_item";
$this->label = "Log Item";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_log_item";
$this->id->externalTableName = "webcam_log_item";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_log_item_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->logId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logId->tableName = "webcam_log_item";
$this->logId->fieldName = "log";
$this->logId->aliasFieldName = "webcam_log_item_log";
$this->logId->label = "Log";
$this->logId->allowNullValue = false;

$this->logTypeId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logTypeId->tableName = "webcam_log_item";
$this->logTypeId->fieldName = "log_type";
$this->logTypeId->aliasFieldName = "webcam_log_item_log_type";
$this->logTypeId->label = "Log Type";
$this->logTypeId->allowNullValue = false;

$this->dataId = new \Nemundo\Model\Type\Number\NumberType($this);
$this->dataId->tableName = "webcam_log_item";
$this->dataId->externalTableName = "webcam_log_item";
$this->dataId->fieldName = "data_id";
$this->dataId->aliasFieldName = "webcam_log_item_data_id";
$this->dataId->label = "Data Id";
$this->dataId->allowNullValue = false;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "webcam_log_item";
$this->text->externalTableName = "webcam_log_item";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "webcam_log_item_text";
$this->text->label = "Text";
$this->text->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "log";
$index->addType($this->logId);

}
public function loadLog() {
if ($this->log == null) {
$this->log = new \Nemundo\Webcam\Data\Log\LogExternalType($this, "webcam_log_item_log");
$this->log->tableName = "webcam_log_item";
$this->log->fieldName = "log";
$this->log->aliasFieldName = "webcam_log_item_log";
$this->log->label = "Log";
}
return $this;
}
public function loadLogType() {
if ($this->logType == null) {
$this->logType = new \Nemundo\Webcam\Data\LogType\LogTypeExternalType($this, "webcam_log_item_log_type");
$this->logType->tableName = "webcam_log_item";
$this->logType->fieldName = "log_type";
$this->logType->aliasFieldName = "webcam_log_item_log_type";
$this->logType->label = "Log Type";
}
return $this;
}
}