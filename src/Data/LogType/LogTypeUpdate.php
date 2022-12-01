<?php
namespace Nemundo\Webcam\Data\LogType;
use Nemundo\Model\Data\AbstractModelUpdate;
class LogTypeUpdate extends AbstractModelUpdate {
/**
* @var LogTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogTypeModel();
}
public function update() {
parent::update();
}
}