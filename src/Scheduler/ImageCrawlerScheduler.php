<?phpnamespace Nemundo\Webcam\Scheduler;use Nemundo\App\Scheduler\Job\AbstractScheduler;use Nemundo\Core\File\File;use Nemundo\Core\File\UniqueFilename;use Nemundo\Core\Image\Cropping\ImageCropping;use Nemundo\Core\Image\Cropping\MaxImageCropping;use Nemundo\Core\Type\DateTime\DateTime;use Nemundo\Core\WebRequest\WebRequest;use Nemundo\Project\Path\TmpPath;use Nemundo\Webcam\Data\Image\Image;use Nemundo\Webcam\Data\Image\ImageCount;use Nemundo\Webcam\Data\Webcam\WebcamReader;use Nemundo\Webcam\Data\Webcam\WebcamUpdate;class ImageCrawlerScheduler extends AbstractScheduler{    protected function loadScheduler()    {        $this->overrideSetting = false;        $this->minute = 5;        $this->consoleScript = true;        $this->scriptName = 'webcam-crawler';    }    public function run()    {        $webcamReader = new WebcamReader();        //$webcamReader->filter->andEqual($webcamReader->model->imageCrawler,true);        foreach ($webcamReader->getData() as $webcamRow) {            $filename = (new TmpPath())                ->addPath((new UniqueFilename())->getUniqueFilename('jpg'))                ->getFilename();            $download = new WebRequest();            $download->downloadUrl($webcamRow->imageUrl, $filename);            $file = new File($filename);            if ($file->fileExists()) {                $hash = $file->getHash();                $count = new ImageCount();                $count->filter->andEqual($count->model->webcamId, $webcamRow->id);                $count->filter->andEqual($count->model->hash, $hash);                if ($count->getCount() == 0) {                    $squareFilename = (new TmpPath())                        ->addPath('square_' . (new UniqueFilename())->getUniqueFilename('jpg'))                        ->getFilename();                    $maxCropping = new MaxImageCropping($filename);                    $maxCropping->aspectRatioWidth = 1;                    $maxCropping->aspectRatioHeight = 1;                    $cropping = new ImageCropping();                    $cropping->sourceFilename = $filename;                    $cropping->destinationFilename = $squareFilename;                    $cropping->croppingDimension = $maxCropping->getCroppingDimension();                    $cropping->cropImage();                    $data = new Image();                    $data->webcamId = $webcamRow->id;                    $data->image->fromFilename($filename);                    $data->squareImage->fromFilename($squareFilename);                    $data->dateTime = (new DateTime())->setNow();                    $data->hash = $hash;                    $imageId = $data->save();                    $update = new WebcamUpdate();                    $update->active = true;                    $update->latestImageId = $imageId;                    $update->updateById($webcamRow->id);                    (new File($squareFilename))->deleteFile();                }                $file->deleteFile();            }        }    }}