<?php
namespace Nemundo\Webcam\Data\Log;
use Nemundo\Model\Id\AbstractModelIdValue;
class LogId extends AbstractModelIdValue {
/**
* @var LogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
}