<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Content\Source\SourceType;
use Nemundo\Webcam\Data\Source\SourceReader;

class SourcePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);

        (new SourceType())->getAdmin($layout);


/*        $table = new AdminTable($layout);

        $sourceReader = new SourceReader();

        $header = new AdminTableHeader($table);
        $header->addText($sourceReader->model->source->label);
        $header->addText($sourceReader->model->url->label);


        foreach ($sourceReader->getData() as $sourceRow) {

            $row = new AdminTableRow($table);
            $row->addText($sourceRow->source);
            $row->addText($sourceRow->url);

        }*/

        return parent::getContent();

    }
}