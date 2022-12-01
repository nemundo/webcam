<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class TextChangeLogUpdate extends AbstractModelUpdate {
/**
* @var TextChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextChangeLogModel();
}
public function update() {
parent::update();
}
}