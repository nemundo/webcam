<?php
namespace Nemundo\Webcam\Data\PublicationStatus;
class PublicationStatusRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PublicationStatusModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $publicationStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->publicationStatus = $this->getModelValue($model->publicationStatus);
}
}