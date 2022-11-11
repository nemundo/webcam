<?php
namespace Nemundo\Webcam\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class WebcamParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'webcam';
}
}