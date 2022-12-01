<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
class TextChangeLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TextChangeLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextChangeLogModel();
}
/**
* @return TextChangeLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TextChangeLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}