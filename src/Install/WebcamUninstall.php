<?php
namespace Nemundo\Webcam\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Webcam\Data\WebcamModelCollection;
use Nemundo\Webcam\Application\WebcamApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class WebcamUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new WebcamModelCollection());
}
}