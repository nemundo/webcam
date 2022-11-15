<?php
namespace Nemundo\Webcam\Data\TextLog;
class TextLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TextLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextLogModel();
}
}