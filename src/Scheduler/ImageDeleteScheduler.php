<?phpnamespace Nemundo\Webcam\Scheduler;use Nemundo\App\Scheduler\Job\AbstractScheduler;use Nemundo\Core\Type\DateTime\DateTime;use Nemundo\Webcam\Data\Image\ImageDelete;use Nemundo\Webcam\Data\Image\ImageReader;class ImageDeleteScheduler extends AbstractScheduler{    protected function loadScheduler()    {        $this->overrideSetting = false;        $this->day = 1;        $this->consoleScript = true;        $this->scriptName = 'webcam-image-delete';    }    public function run()    {        //$date = (new DateTime())->setNow()->minusDay(3);        $date = (new DateTime())->setNow()->minusDay(1);        $imageReader = new ImageReader();        $imageReader->filter->andEqualOrSmaller($imageReader->model->dateTime, $date->getIsoDate());        foreach ($imageReader->getData() as $imageRow) {            (new ImageDelete())->deleteById($imageRow->id);        }    }}