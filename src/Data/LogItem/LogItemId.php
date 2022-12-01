<?php
namespace Nemundo\Webcam\Data\LogItem;
use Nemundo\Model\Id\AbstractModelIdValue;
class LogItemId extends AbstractModelIdValue {
/**
* @var LogItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogItemModel();
}
}