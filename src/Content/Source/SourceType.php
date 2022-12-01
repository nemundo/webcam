<?php

namespace Nemundo\Webcam\Content\Source;

use Nemundo\Content\Type\AbstractContentType;

class SourceType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Source';
        $this->typeId = '298bd5d4-3d94-4a83-a066-4d99a4b0a419';
        $this->formClassList[] = SourceForm::class;
        $this->viewClassList[] = SourceView::class;
        $this->adminClass = SourceAdmin::class;
        $this->itemClass = SourceItem::class;
    }
}