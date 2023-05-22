<?php

namespace Nemundo\Webcam\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Webcam\Application\WebcamApplication;
use Nemundo\Webcam\Content\Source\SourceType;
use Nemundo\Webcam\Content\Webcam\WebcamType;
use Nemundo\Webcam\Data\PublicationStatus\PublicationStatus;
use Nemundo\Webcam\Data\WebcamModelCollection;
use Nemundo\Webcam\Scheduler\ImageCrawlerScheduler;
use Nemundo\Webcam\Scheduler\ImageDeleteScheduler;
use Nemundo\Webcam\Script\ImageCleanScript;
use Nemundo\Webcam\Script\SourceImportScript;
use Nemundo\Webcam\Script\WebcamCleanScript;
use Nemundo\Webcam\Type\Publication\AbstractPublication;
use Nemundo\Webcam\Type\Publication\DeletePublication;
use Nemundo\Webcam\Type\Publication\DraftPublication;
use Nemundo\Webcam\Type\Publication\PublishedPublication;

class WebcamInstall extends AbstractInstall
{
    public function install()
    {

        (new ContentApplication())->installApp();
        //(new DatasetApplication())->installApp();

        (new ModelCollectionSetup())
            ->addCollection(new WebcamModelCollection());

        (new SchedulerSetup(new WebcamApplication()))
            ->addScheduler(new ImageCrawlerScheduler())
            ->addScheduler(new ImageDeleteScheduler());

        (new ScriptSetup(new WebcamApplication()))
            ->addScript(new SourceImportScript())
            ->addScript(new ImageCleanScript())
            ->addScript(new WebcamCleanScript());

        (new ContentTypeSetup(new WebcamApplication()))
            ->addContentType(new SourceType())
            ->addContentType(new WebcamType());

        $this
            ->addPublication(new DraftPublication())
            ->addPublication(new PublishedPublication())
            ->addPublication(new DeletePublication());


    }


    private function addPublication(AbstractPublication $publication)
    {

        $data = new PublicationStatus();
        $data->updateOnDuplicate = true;
        $data->id = $publication->id;
        $data->publicationStatus = $publication->publicationStatus;
        $data->save();

        return $this;

    }


}