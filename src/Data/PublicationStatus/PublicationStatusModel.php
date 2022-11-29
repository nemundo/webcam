<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatusModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $publicationStatus;

protected function loadModel() {
$this->tableName = "webcam_publication_status";
$this->aliasTableName = "webcam_publication_status";
$this->label = "Publication Status";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_publication_status";
$this->id->externalTableName = "webcam_publication_status";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_publication_status_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->publicationStatus = new \Nemundo\Model\Type\Text\TextType($this);
$this->publicationStatus->tableName = "webcam_publication_status";
$this->publicationStatus->externalTableName = "webcam_publication_status";
$this->publicationStatus->fieldName = "publication_status";
$this->publicationStatus->aliasFieldName = "webcam_publication_status_publication_status";
$this->publicationStatus->label = "Publication Status";
$this->publicationStatus->allowNullValue = false;
$this->publicationStatus->length = 255;

}
}