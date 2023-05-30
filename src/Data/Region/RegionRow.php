<?php
namespace Nemundo\Webcam\Data\Region;
class RegionRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var RegionModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $region;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->region = $this->getModelValue($model->region);
}
}