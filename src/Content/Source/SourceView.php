<?php
namespace Nemundo\Webcam\Content\Source;
use Nemundo\Content\View\AbstractContentView;
class SourceView extends AbstractContentView {
protected function loadView() {
$this->viewName='default';
$this->viewId = '138fe81a-6d43-47ad-8941-440f689849c0';
$this->defaultView = true;
}
public function getContent() {
return parent::getContent();
}
}