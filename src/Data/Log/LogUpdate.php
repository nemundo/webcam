<?php
namespace Nemundo\Webcam\Data\Log;
use Nemundo\Model\Data\AbstractModelUpdate;
class LogUpdate extends AbstractModelUpdate {
/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $webcamId;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->webcamId, $this->webcamId);
parent::update();
}
}