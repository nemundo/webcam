<?php
namespace Nemundo\Webcam\Data\Image;
class ImageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
}
}