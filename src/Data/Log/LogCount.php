<?php
namespace Nemundo\Webcam\Data\Log;
class LogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
}