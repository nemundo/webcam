<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
class TextChangeLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TextChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextChangeLogModel();
}
}