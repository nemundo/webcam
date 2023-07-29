<?php

namespace Nemundo\Webcam\Content\WebcamPublish;

use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;

class WebcamPublishType extends AbstractWorkflowStatusType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'WebcamPublish';
        $this->typeId = '475487f4-9eeb-43f5-83f0-236e9ef750f0';
        $this->formClassList[] = WebcamPublishForm::class;
        $this->viewClassList[] = WebcamPublishView::class;
        $this->itemClass = WebcamPublishItem::class;
    }
}