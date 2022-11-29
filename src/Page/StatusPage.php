<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\App\Application\Com\Paragraph\ModelDataFileSizeParagraph;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Data\Image\ImageModel;

class StatusPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);


        $p= new ModelDataFileSizeParagraph($layout);
        $p->model = new ImageModel();



        return parent::getContent();
    }
}