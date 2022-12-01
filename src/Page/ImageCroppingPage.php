<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Form\File\AdminCroppingImageUpload;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Image\Cropping\CroppingDimension;
use Nemundo\Package\CropperJs\CropperJs;
use Nemundo\Webcam\Com\Form\WebcamImageCroppingForm;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Content\Webcam\WebcamItem;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Site\WebcamSite;

class ImageCroppingPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);

        $webcamId = (new WebcamParameter())->getValue();
        $webcamRow = (new WebcamItem($webcamId))->getDataRow();

        $title = new AdminTitle($layout);
        $title->content = $webcamRow->webcam;

        $form = new WebcamImageCroppingForm($layout);
        $form->webcamRow = $webcamRow;
        $form->redirectSite = WebcamSite::$site;


        /*$image = new CropperJs($layout);  // new AdminCroppingImageUpload($layout);

        $image->imageUrl = $webcamRow->latestImage->image->getUrl();
        /*$image->aspectRatioX = 4;
        $image->aspectRatioY = 3;*/
        //$image->croppingDimension = new CroppingDimension();
        /*$image->croppingDimension->width = 400;
        $image->croppingDimension->height = 300;*/

        return parent::getContent();

    }
}