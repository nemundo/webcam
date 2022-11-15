<?php
namespace Nemundo\Webcam\Data\Log;
class LogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $webcamId;

/**
* @var \Nemundo\Webcam\Data\Webcam\WebcamExternalType
*/
public $webcam;

protected function loadModel() {
$this->tableName = "webcam_log";
$this->aliasTableName = "webcam_log";
$this->label = "Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_log";
$this->id->externalTableName = "webcam_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "webcam_log";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "webcam_log_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "webcam_log";
$this->dateTime->externalTableName = "webcam_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "webcam_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->webcamId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->webcamId->tableName = "webcam_log";
$this->webcamId->fieldName = "webcam";
$this->webcamId->aliasFieldName = "webcam_log_webcam";
$this->webcamId->label = "Webcam";
$this->webcamId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "webcam";
$index->addType($this->webcamId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "webcam_log_user");
$this->user->tableName = "webcam_log";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "webcam_log_user";
$this->user->label = "User";
}
return $this;
}
public function loadWebcam() {
if ($this->webcam == null) {
$this->webcam = new \Nemundo\Webcam\Data\Webcam\WebcamExternalType($this, "webcam_log_webcam");
$this->webcam->tableName = "webcam_log";
$this->webcam->fieldName = "webcam";
$this->webcam->aliasFieldName = "webcam_log_webcam";
$this->webcam->label = "Webcam";
}
return $this;
}
}