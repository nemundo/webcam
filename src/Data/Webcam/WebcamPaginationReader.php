<?php
namespace Nemundo\Webcam\Data\Webcam;
class WebcamPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WebcamModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamModel();
}
/**
* @return WebcamRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WebcamRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}