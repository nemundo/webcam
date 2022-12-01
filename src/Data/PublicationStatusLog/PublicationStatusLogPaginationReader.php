<?php
namespace Nemundo\Webcam\Data\PublicationStatusLog;
class PublicationStatusLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PublicationStatusLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusLogModel();
}
/**
* @return PublicationStatusLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PublicationStatusLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}