<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
use Nemundo\Model\Id\AbstractModelIdValue;
class PublicationStatusId extends AbstractModelIdValue {
/**
* @var PublicationStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusModel();
}
}