<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class PublicationStatusLogId extends AbstractModelIdValue {
/**
* @var PublicationStatusLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusLogModel();
}
}