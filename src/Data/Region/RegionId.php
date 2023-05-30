<?php
namespace Nemundo\Webcam\Data\Region;
use Nemundo\Model\Id\AbstractModelIdValue;
class RegionId extends AbstractModelIdValue {
/**
* @var RegionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new RegionModel();
}
}