<?php

namespace Nemundo\Webcam\Content\WebcamErfassung;

use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Webcam\Content\WebcamDelete\WebcamDeleteType;
use Nemundo\Webcam\Content\WebcamPublish\WebcamPublishType;

class WebcamErfassungType extends AbstractWorkflowStatusType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Webcam Erfassung';
        $this->typeId = '545b0192-fbad-432b-93a5-32cf8b15b259';
        $this->formClassList[] = WebcamErfassungForm::class;
        $this->viewClassList[] = WebcamErfassungView::class;
        $this->itemClass = WebcamErfassungItem::class;
        $this->changeStatus=true;

        $this->nextWorkflowStatusClass[]=WebcamPublishType::class;
        $this->nextWorkflowStatusClass[]=WebcamDeleteType::class;

    }
}