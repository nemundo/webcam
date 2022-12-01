<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
class TextChangeLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "webcam_text_change_log";
$this->aliasTableName = "webcam_text_change_log";
$this->label = "Text Change Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_text_change_log";
$this->id->externalTableName = "webcam_text_change_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_text_change_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

}
}