<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatusCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PublicationStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusModel();
}
}