<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatusPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PublicationStatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicationStatusModel();
}
/**
* @return PublicationStatusRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PublicationStatusRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}