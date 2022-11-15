<?php
namespace Nemundo\Webcam\Data\Log;
class LogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var int
*/
public $webcamId;

/**
* @var \Nemundo\Webcam\Data\Webcam\WebcamRow
*/
public $webcam;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->webcamId = intval($this->getModelValue($model->webcamId));
if ($model->webcam !== null) {
$this->loadNemundoWebcamDataWebcamWebcamwebcamRow($model->webcam);
}
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoWebcamDataWebcamWebcamwebcamRow($model) {
$this->webcam = new \Nemundo\Webcam\Data\Webcam\WebcamRow($this->row, $model);
}
}