<?php
namespace Nemundo\Webcam\Data\Region;
class RegionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var RegionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionModel();
}
}