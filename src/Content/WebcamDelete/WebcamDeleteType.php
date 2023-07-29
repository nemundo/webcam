<?php

namespace Nemundo\Webcam\Content\WebcamDelete;

use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;

class WebcamDeleteType extends AbstractWorkflowStatusType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'WebcamDelete';
        $this->typeId = 'ab69d1cd-1e62-4ace-ac19-44ce459523de';
        $this->formClassList[] = WebcamDeleteForm::class;
        $this->viewClassList[] = WebcamDeleteView::class;
        $this->itemClass = WebcamDeleteItem::class;
    }
}