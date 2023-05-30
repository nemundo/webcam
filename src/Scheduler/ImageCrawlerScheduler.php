<?phpnamespace Nemundo\Webcam\Scheduler;use Nemundo\App\Scheduler\Job\AbstractScheduler;use Nemundo\Core\File\File;use Nemundo\Core\File\UniqueFilename;use Nemundo\Core\Image\Cropping\ImageCropping;use Nemundo\Core\Image\Cropping\MaxImageCropping;use Nemundo\Core\Type\DateTime\DateTime;use Nemundo\Core\WebRequest\WebRequest;use Nemundo\Project\Path\TmpPath;use Nemundo\Webcam\Data\Image\Image;use Nemundo\Webcam\Data\Image\ImageCount;use Nemundo\Webcam\Data\Webcam\WebcamReader;use Nemundo\Webcam\Data\Webcam\WebcamUpdate;use Nemundo\Webcam\Import\WebcamImageImport;use Nemundo\Webcam\Type\Publication\PublishedPublication;class ImageCrawlerScheduler extends AbstractScheduler{    protected function loadScheduler()    {        $this->overrideSetting = false;        $this->minute = 5;        $this->consoleScript = true;        $this->scriptName = 'webcam-crawler';    }    public function run()    {        $webcamReader = new WebcamReader();        $webcamReader->filter->andEqual($webcamReader->model->publicationStatusId, (new PublishedPublication())->id);        foreach ($webcamReader->getData() as $webcamRow) {            (new WebcamImageImport())->importImgae($webcamRow);        }        // check for active        /*$webcamReader = new WebcamReader();        $webcamReader->filter->andEqual($webcamReader->model->publicationStatusId, (new PublishedPublication())->id);        foreach ($webcamReader->getData() as $webcamRow) {        }*/    }}