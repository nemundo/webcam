<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
class WebcamErfassungValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebcamErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamErfassungModel();
}
}