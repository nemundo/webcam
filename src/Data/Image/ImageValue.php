<?php
namespace Nemundo\Webcam\Data\Image;
class ImageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ImageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ImageModel();
}
}