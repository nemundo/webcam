<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PublicationStatusLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusLogModel();
}
}