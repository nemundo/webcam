<?php
namespace Nemundo\Webcam\Data\TextLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class TextLogUpdate extends AbstractModelUpdate {
/**
* @var TextLogModel
*/
public $model;

/**
* @var string
*/
public $logId;

public function __construct() {
parent::__construct();
$this->model = new TextLogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
parent::update();
}
}