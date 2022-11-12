<?php
namespace Nemundo\Webcam\Data\Source;
class SourceModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $source;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasUrl;

protected function loadModel() {
$this->tableName = "webcam_source";
$this->aliasTableName = "webcam_source";
$this->label = "Source";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "webcam_source";
$this->id->externalTableName = "webcam_source";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "webcam_source_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->source = new \Nemundo\Model\Type\Text\TextType($this);
$this->source->tableName = "webcam_source";
$this->source->externalTableName = "webcam_source";
$this->source->fieldName = "source";
$this->source->aliasFieldName = "webcam_source_source";
$this->source->label = "Source";
$this->source->allowNullValue = false;
$this->source->length = 255;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "webcam_source";
$this->url->externalTableName = "webcam_source";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "webcam_source_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$this->hasUrl = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasUrl->tableName = "webcam_source";
$this->hasUrl->externalTableName = "webcam_source";
$this->hasUrl->fieldName = "has_url";
$this->hasUrl->aliasFieldName = "webcam_source_has_url";
$this->hasUrl->label = "Has Url";
$this->hasUrl->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "source";
$index->addType($this->source);

}
}