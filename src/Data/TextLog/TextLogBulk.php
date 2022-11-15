<?php
namespace Nemundo\Webcam\Data\TextLog;
class TextLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TextLogModel
*/
protected $model;

/**
* @var string
*/
public $logId;

public function __construct() {
parent::__construct();
$this->model = new TextLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->logId, $this->logId);
$id = parent::save();
return $id;
}
}