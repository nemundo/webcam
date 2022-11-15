<?php
namespace Nemundo\Webcam\Data\TextLog;
class TextLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "webcam_text_log";
$this->aliasTableName = "webcam_text_log";
$this->label = "Text Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_text_log";
$this->id->externalTableName = "webcam_text_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_text_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->logId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logId->tableName = "webcam_text_log";
$this->logId->fieldName = "log";
$this->logId->aliasFieldName = "webcam_text_log_log";
$this->logId->label = "Log";
$this->logId->allowNullValue = false;

}
public function loadLog() {
if ($this->log == null) {
$this->log = new \Nemundo\Webcam\Data\Log\LogExternalType($this, "webcam_text_log_log");
$this->log->tableName = "webcam_text_log";
$this->log->fieldName = "log";
$this->log->aliasFieldName = "webcam_text_log_log";
$this->log->label = "Log";
}
return $this;
}
}