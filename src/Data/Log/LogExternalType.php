<?php
namespace Nemundo\Webcam\Data\Log;
class LogExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $webcamId;

/**
* @var \Nemundo\Webcam\Data\Webcam\WebcamExternalType
*/
public $webcam;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LogModel::class;
$this->externalTableName = "webcam_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->webcamId = new \Nemundo\Model\Type\Id\IdType();
$this->webcamId->fieldName = "webcam";
$this->webcamId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->webcamId->aliasFieldName = $this->webcamId->tableName ."_".$this->webcamId->fieldName;
$this->webcamId->label = "Webcam";
$this->addType($this->webcamId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
public function loadWebcam() {
if ($this->webcam == null) {
$this->webcam = new \Nemundo\Webcam\Data\Webcam\WebcamExternalType(null, $this->parentFieldName . "_webcam");
$this->webcam->fieldName = "webcam";
$this->webcam->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->webcam->aliasFieldName = $this->webcam->tableName ."_".$this->webcam->fieldName;
$this->webcam->label = "Webcam";
$this->addType($this->webcam);
}
return $this;
}
}