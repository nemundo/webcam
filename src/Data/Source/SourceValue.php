<?php
namespace Nemundo\Webcam\Data\Source;
class SourceValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var SourceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
}