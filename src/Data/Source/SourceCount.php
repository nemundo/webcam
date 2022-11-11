<?php
namespace Nemundo\Webcam\Data\Source;
class SourceCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var SourceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
}