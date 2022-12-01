<?php

namespace Nemundo\Webcam\Site;

use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Content\Webcam\WebcamRemove;
use Nemundo\Webcam\Data\Image\ImageDelete;
use Nemundo\Webcam\Data\Webcam\WebcamUpdate;
use Nemundo\Webcam\Import\WebcamImageImport;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Type\Publication\DeletePublication;

class ImageDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var ImageDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Image Delete';
        $this->url = 'image-delete';

        ImageDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $webcamId = (new WebcamParameter())->getValue();

        $delete = new ImageDelete();
        $delete->filter->andEqual($delete->model->webcamId,$webcamId);
        $delete->delete();

        $webcamRow = (new WebcamItem($webcamId))->getDataRow();
        (new WebcamImageImport())->importImgae($webcamRow);

        (new UrlReferer())->redirect();

    }
}