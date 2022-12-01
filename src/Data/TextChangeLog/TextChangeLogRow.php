<?php
namespace Nemundo\Webcam\Data\TextChangeLog;
class TextChangeLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var TextChangeLogModel
*/
public $model;

/**
* @var string
*/
public $id;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
}
}