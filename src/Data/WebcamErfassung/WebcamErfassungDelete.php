<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
class WebcamErfassungDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebcamErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamErfassungModel();
}
}