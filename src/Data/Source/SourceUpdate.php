<?php
namespace Nemundo\Webcam\Data\Source;
use Nemundo\Model\Data\AbstractModelUpdate;
class SourceUpdate extends AbstractModelUpdate {
/**
* @var SourceModel
*/
public $model;

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

/**
* @var string
*/
public $email;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->hasUrl, $this->hasUrl);
$this->typeValueList->setModelValue($this->model->email, $this->email);
parent::update();
}
}