<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Content\Region\RegionType;

class RegionPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);

        (new RegionType())->getAdmin($layout);


        return parent::getContent();
    }
}