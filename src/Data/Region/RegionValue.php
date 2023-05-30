<?php
namespace Nemundo\Webcam\Data\Region;
class RegionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var RegionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionModel();
}
}