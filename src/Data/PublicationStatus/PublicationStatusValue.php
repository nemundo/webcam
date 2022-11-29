<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatusValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PublicationStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusModel();
}
}