<?php

namespace Nemundo\Webcam\Page\Workflow;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Content\Source\SourceItem;
use Nemundo\Webcam\Parameter\SourceParameter;
use Nemundo\Webcam\Reader\Webcam\WebcamDataReader;

class WorkflowSourcePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $sourceId = (new SourceParameter())->getValue();
        $sourceRow = (new SourceItem($sourceId))->getDataRow();

        $title = new AdminTitle($layout);
        $title->content = $sourceRow->source;

        $table = new AdminTable($layout);

        $webcamReader = new WebcamDataReader();
        $webcamReader->sourceId = $sourceId;

        foreach ($webcamReader->getData() as $webcamRow) {

            $row = new AdminTableRow($table);
            $row->addText($webcamRow->webcam);

        }


        return parent::getContent();
    }
}