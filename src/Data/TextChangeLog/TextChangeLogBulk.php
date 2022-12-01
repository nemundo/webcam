<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
class TextChangeLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var TextChangeLogModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new TextChangeLogModel();
}
public function save() {
$id = parent::save();
return $id;
}
}