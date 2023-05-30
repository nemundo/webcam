<?php
namespace Nemundo\Webcam\Data\Region;
class RegionExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $region;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = RegionModel::class;
$this->externalTableName = "webcam_region";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->region = new \Nemundo\Model\Type\Text\TextType();
$this->region->fieldName = "region";
$this->region->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->region->externalTableName = $this->externalTableName;
$this->region->aliasFieldName = $this->region->tableName . "_" . $this->region->fieldName;
$this->region->label = "Region";
$this->addType($this->region);

}
}