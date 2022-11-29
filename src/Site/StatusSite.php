<?php
namespace Nemundo\Webcam\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\StatusPage;
class StatusSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Status';
$this->url = 'status';
}
public function loadContent() {
(new StatusPage())->render();
}
}