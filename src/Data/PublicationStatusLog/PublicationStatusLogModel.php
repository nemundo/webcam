<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $publicationStatusOldId;

/**
* @var \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType
*/
public $publicationStatusOld;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $publicationStatusNewId;

/**
* @var \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType
*/
public $publicationStatusNew;

protected function loadModel() {
$this->tableName = "webcam_publication_status_log";
$this->aliasTableName = "webcam_publication_status_log";
$this->label = "Publication Status Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_publication_status_log";
$this->id->externalTableName = "webcam_publication_status_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_publication_status_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->logId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->logId->tableName = "webcam_publication_status_log";
$this->logId->fieldName = "log";
$this->logId->aliasFieldName = "webcam_publication_status_log_log";
$this->logId->label = "Log";
$this->logId->allowNullValue = false;

$this->publicationStatusOldId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->publicationStatusOldId->tableName = "webcam_publication_status_log";
$this->publicationStatusOldId->fieldName = "publication_status_old";
$this->publicationStatusOldId->aliasFieldName = "webcam_publication_status_log_publication_status_old";
$this->publicationStatusOldId->label = "Publication Status Old";
$this->publicationStatusOldId->allowNullValue = false;

$this->publicationStatusNewId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->publicationStatusNewId->tableName = "webcam_publication_status_log";
$this->publicationStatusNewId->fieldName = "publication_status_new";
$this->publicationStatusNewId->aliasFieldName = "webcam_publication_status_log_publication_status_new";
$this->publicationStatusNewId->label = "Publication Status New";
$this->publicationStatusNewId->allowNullValue = false;

}
public function loadLog() {
if ($this->log == null) {
$this->log = new \Nemundo\Webcam\Data\Log\LogExternalType($this, "webcam_publication_status_log_log");
$this->log->tableName = "webcam_publication_status_log";
$this->log->fieldName = "log";
$this->log->aliasFieldName = "webcam_publication_status_log_log";
$this->log->label = "Log";
}
return $this;
}
public function loadPublicationStatusOld() {
if ($this->publicationStatusOld == null) {
$this->publicationStatusOld = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType($this, "webcam_publication_status_log_publication_status_old");
$this->publicationStatusOld->tableName = "webcam_publication_status_log";
$this->publicationStatusOld->fieldName = "publication_status_old";
$this->publicationStatusOld->aliasFieldName = "webcam_publication_status_log_publication_status_old";
$this->publicationStatusOld->label = "Publication Status Old";
}
return $this;
}
public function loadPublicationStatusNew() {
if ($this->publicationStatusNew == null) {
$this->publicationStatusNew = new \Nemundo\Webcam\Data\PublicationStatus\PublicationStatusExternalType($this, "webcam_publication_status_log_publication_status_new");
$this->publicationStatusNew->tableName = "webcam_publication_status_log";
$this->publicationStatusNew->fieldName = "publication_status_new";
$this->publicationStatusNew->aliasFieldName = "webcam_publication_status_log_publication_status_new";
$this->publicationStatusNew->label = "Publication Status New";
}
return $this;
}
}