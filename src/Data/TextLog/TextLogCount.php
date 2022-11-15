<?php
namespace Nemundo\Webcam\Data\TextLog;
class TextLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TextLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextLogModel();
}
}