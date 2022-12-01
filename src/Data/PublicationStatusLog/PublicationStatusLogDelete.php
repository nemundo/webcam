<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PublicationStatusLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusLogModel();
}
}