<?php
namespace Nemundo\Webcam\Data\LogItem;
class LogItemPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var LogItemModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LogItemModel();
}
/**
* @return LogItemRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new LogItemRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}