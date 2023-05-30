<?php
namespace Nemundo\Webcam\Data\Region;
class RegionBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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