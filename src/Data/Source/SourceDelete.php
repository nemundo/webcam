<?php
namespace Nemundo\Webcam\Data\Source;
class SourceDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var SourceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
}