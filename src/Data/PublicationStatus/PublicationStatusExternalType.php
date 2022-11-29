<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatusExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $publicationStatus;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PublicationStatusModel::class;
$this->externalTableName = "webcam_publication_status";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->publicationStatus = new \Nemundo\Model\Type\Text\TextType();
$this->publicationStatus->fieldName = "publication_status";
$this->publicationStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->publicationStatus->externalTableName = $this->externalTableName;
$this->publicationStatus->aliasFieldName = $this->publicationStatus->tableName . "_" . $this->publicationStatus->fieldName;
$this->publicationStatus->label = "Publication Status";
$this->addType($this->publicationStatus);

}
}