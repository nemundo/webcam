<?php
namespace Nemundo\Webcam\Data\LogItem;
use Nemundo\Model\Data\AbstractModelUpdate;
class LogItemUpdate extends AbstractModelUpdate {
/**
* @var LogItemModel
*/
public $model;

/**
* @var string
*/
public $logId;

/**
* @var string
*/
public $logTypeId;

/**
* @var int
*/
public $dataId;

/**
* @var string
*/
public $text;

public function __construct() {
parent::__construct();
$this->model = new LogItemModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$this->typeValueList->setModelValue($this->model->logTypeId, $this->logTypeId);
$this->typeValueList->setModelValue($this->model->dataId, $this->dataId);
$this->typeValueList->setModelValue($this->model->text, $this->text);
parent::update();
}
}