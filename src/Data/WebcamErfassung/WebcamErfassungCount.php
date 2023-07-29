<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
class WebcamErfassungCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebcamErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamErfassungModel();
}
}