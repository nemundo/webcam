<?php
namespace Nemundo\Webcam\Data\LogItem;
class LogItemDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LogItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogItemModel();
}
}