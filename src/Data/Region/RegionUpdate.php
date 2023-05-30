<?php
namespace Nemundo\Webcam\Data\Region;
use Nemundo\Model\Data\AbstractModelUpdate;
class RegionUpdate extends AbstractModelUpdate {
/**
* @var RegionModel
*/
public $model;

/**
* @var string
*/
public $region;

public function __construct() {
parent::__construct();
$this->model = new RegionModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->region, $this->region);
parent::update();
}
}