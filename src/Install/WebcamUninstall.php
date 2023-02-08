<?php

namespace Nemundo\Webcam\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\Setup\ContentTypeRemove;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Webcam\Content\Webcam\WebcamType;
use Nemundo\Webcam\Data\WebcamModelCollection;

class WebcamUninstall extends AbstractUninstall
{
    public function uninstall()
    {

        (new ModelCollectionSetup())->removeCollection(new WebcamModelCollection());

        (new ContentTypeRemove())
            ->removeContent(new WebcamType());

    }
}