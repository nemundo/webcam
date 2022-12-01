<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
class TextChangeLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TextChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextChangeLogModel();
}
}