<?php
namespace Nemundo\Webcam\Data\Region;
class RegionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $region;

protected function loadModel() {
$this->tableName = "webcam_region";
$this->aliasTableName = "webcam_region";
$this->label = "Region";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_region";
$this->id->externalTableName = "webcam_region";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_region_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->region = new \Nemundo\Model\Type\Text\TextType($this);
$this->region->tableName = "webcam_region";
$this->region->externalTableName = "webcam_region";
$this->region->fieldName = "region";
$this->region->aliasFieldName = "webcam_region_region";
$this->region->label = "Region";
$this->region->allowNullValue = false;
$this->region->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "region";
$index->addType($this->region);

}
}