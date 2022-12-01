<?php
namespace Nemundo\Webcam\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\LogPage;
class LogSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Log';
$this->url = 'log';
}
public function loadContent() {
(new LogPage())->render();
}
}