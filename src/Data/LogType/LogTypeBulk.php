<?php
namespace Nemundo\Webcam\Data\LogType;
class LogTypeBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var LogTypeModel
*/
protected $model;

/**
* @var int
*/
public $id;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$id = parent::save();
return $id;
}
}