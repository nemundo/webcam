<?php
namespace Nemundo\Webcam\Data\LogItem;
class LogItemCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LogItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogItemModel();
}
}