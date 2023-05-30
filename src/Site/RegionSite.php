<?php
namespace Nemundo\Webcam\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Webcam\Page\RegionPage;
class RegionSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Region';
$this->url = 'region';
}
public function loadContent() {
(new RegionPage())->render();
}
}