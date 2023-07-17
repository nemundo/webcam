<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebcamErfassungId extends AbstractModelIdValue {
/**
* @var WebcamErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamErfassungModel();
}
}