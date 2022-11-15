<?php
namespace Nemundo\Webcam\Data\TextLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class TextLogId extends AbstractModelIdValue {
/**
* @var TextLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextLogModel();
}
}