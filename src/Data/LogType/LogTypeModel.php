<?php
namespace Nemundo\Webcam\Data\LogType;
class LogTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "webcam_log_type";
$this->aliasTableName = "webcam_log_type";
$this->label = "Log Type";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_log_type";
$this->id->externalTableName = "webcam_log_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_log_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

}
}