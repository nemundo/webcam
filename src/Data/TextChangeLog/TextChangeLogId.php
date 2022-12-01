<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class TextChangeLogId extends AbstractModelIdValue {
/**
* @var TextChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextChangeLogModel();
}
}