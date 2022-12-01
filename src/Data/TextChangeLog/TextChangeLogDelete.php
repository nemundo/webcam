<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
class TextChangeLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TextChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextChangeLogModel();
}
}