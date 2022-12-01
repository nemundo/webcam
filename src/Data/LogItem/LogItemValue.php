<?php
namespace Nemundo\Webcam\Data\LogItem;
class LogItemValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LogItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogItemModel();
}
}