<?php

namespace Nemundo\Webcam\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Webcam\Application\WebcamApplication;
use Nemundo\Webcam\Content\Webcam\WebcamType;
use Nemundo\Webcam\Data\WebcamModelCollection;
use Nemundo\Webcam\Scheduler\ImageCrawlerScheduler;
use Nemundo\Webcam\Script\SourceImportScript;

class WebcamInstall extends AbstractInstall
{
    public function install()
    {


        (new ContentApplication())->installApp();
        //(new DatasetApplication())->installApp();

        (new ModelCollectionSetup())
            ->addCollection(new WebcamModelCollection());

        (new SchedulerSetup(new WebcamApplication()))
            ->addScheduler(new ImageCrawlerScheduler());

        (new ScriptSetup(new WebcamApplication()))
        ->addScript(new SourceImportScript());

        (new ContentTypeSetup(new WebcamApplication()))
            ->addContentType(new WebcamType());


    }
}