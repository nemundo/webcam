<?php

namespace Nemundo\Webcam\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Webcam\Data\Image\ImageDelete;
use Nemundo\Webcam\Data\Webcam\WebcamUpdate;

class ImageCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {

        $this->scriptName = 'webcam-image-clean';

    }

    public function run()
    {

        $update = new WebcamUpdate();
        $update->active = false;
        $update->update();

        (new ImageDelete())->delete();

    }
}