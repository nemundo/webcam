<?php

namespace Nemundo\Webcam;

use Nemundo\Core\Path\Path;
use Nemundo\Project\AbstractProject;

class WebcamProject extends AbstractProject
{
    public function loadProject()
    {
        $this->project = 'Webcam';
        $this->projectName = 'webcam';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = (new Path())
            ->addPath(__DIR__)
            ->addParentPath()
            ->addPath('model')
            ->getPath();
    }
}