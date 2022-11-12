<?php
namespace Nemundo\Webcam\Data\Source;
class SourceBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SourceModel
*/
protected $model;

/**
* @var string
*/
public $source;

/**
* @var string
*/
public $url;

/**
* @var bool
*/
public $hasUrl;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->hasUrl, $this->hasUrl);
$id = parent::save();
return $id;
}
}