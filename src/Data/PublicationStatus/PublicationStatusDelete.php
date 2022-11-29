<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatusDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PublicationStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusModel();
}
}