<?php
namespace Nemundo\Webcam\Data\Log;
class Log extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var LogModel
*/
protected $model;

/**
* @var string
*/
public $webcamId;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->webcamId, $this->webcamId);
$id = parent::save();
return $id;
}
}