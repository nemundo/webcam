<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PublicationStatusLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusLogModel();
}
}