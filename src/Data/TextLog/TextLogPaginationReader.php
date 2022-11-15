<?php
namespace Nemundo\Webcam\Data\TextLog;
class TextLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TextLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextLogModel();
}
/**
* @return TextLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TextLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}