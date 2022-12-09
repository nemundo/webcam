<?php

namespace Nemundo\Webcam\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Webcam\Application\WebcamApplication;
use Nemundo\Webcam\Data\Image\ImageDelete;
use Nemundo\Webcam\Data\Webcam\WebcamUpdate;

class WebcamCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {

        $this->scriptName = 'webcam-clean';

    }

    public function run()
    {

        (new WebcamApplication())->reinstallApp();

    }
}