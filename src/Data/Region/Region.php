<?php
namespace Nemundo\Webcam\Data\Region;
class Region extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var RegionModel
*/
protected $model;

/**
* @var string
*/
public $region;

public function __construct() {
parent::__construct();
$this->model = new RegionModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->region, $this->region);
$id = parent::save();
return $id;
}
}