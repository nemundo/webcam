<?php
namespace Nemundo\Webcam\Data\Region;
class RegionDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var RegionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionModel();
}
}