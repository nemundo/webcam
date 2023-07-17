<?php
namespace Nemundo\Webcam\Data\WebcamErfassung;
class WebcamErfassungPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WebcamErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebcamErfassungModel();
}
/**
* @return WebcamErfassungRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WebcamErfassungRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}