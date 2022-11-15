<?php
namespace Nemundo\Webcam\Data\TextLog;
class TextLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TextLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextLogModel();
}
}