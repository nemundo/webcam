<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
public $publicationStatusOldId;

/**
* @var \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType
*/
public $publicationStatusOld;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $publicationStatusNewId;

/**
* @var \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType
*/
public $publicationStatusNew;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PublicationStatusLogModel::class;
$this->externalTableName = "webcam_publication_status_log";
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

$this->publicationStatusOldId = new \Nemundo\Model\Type\Id\IdType();
$this->publicationStatusOldId->fieldName = "publication_status_old";
$this->publicationStatusOldId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->publicationStatusOldId->aliasFieldName = $this->publicationStatusOldId->tableName ."_".$this->publicationStatusOldId->fieldName;
$this->publicationStatusOldId->label = "Publication Status Old";
$this->addType($this->publicationStatusOldId);

$this->publicationStatusNewId = new \Nemundo\Model\Type\Id\IdType();
$this->publicationStatusNewId->fieldName = "publication_status_new";
$this->publicationStatusNewId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->publicationStatusNewId->aliasFieldName = $this->publicationStatusNewId->tableName ."_".$this->publicationStatusNewId->fieldName;
$this->publicationStatusNewId->label = "Publication Status New";
$this->addType($this->publicationStatusNewId);

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
public function loadPublicationStatusOld() {
if ($this->publicationStatusOld == null) {
$this->publicationStatusOld = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType(null, $this->parentFieldName . "_publication_status_old");
$this->publicationStatusOld->fieldName = "publication_status_old";
$this->publicationStatusOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->publicationStatusOld->aliasFieldName = $this->publicationStatusOld->tableName ."_".$this->publicationStatusOld->fieldName;
$this->publicationStatusOld->label = "Publication Status Old";
$this->addType($this->publicationStatusOld);
}
return $this;
}
public function loadPublicationStatusNew() {
if ($this->publicationStatusNew == null) {
$this->publicationStatusNew = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType(null, $this->parentFieldName . "_publication_status_new");
$this->publicationStatusNew->fieldName = "publication_status_new";
$this->publicationStatusNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->publicationStatusNew->aliasFieldName = $this->publicationStatusNew->tableName ."_".$this->publicationStatusNew->fieldName;
$this->publicationStatusNew->label = "Publication Status New";
$this->addType($this->publicationStatusNew);
}
return $this;
}
}