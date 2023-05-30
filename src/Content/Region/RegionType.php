<?php

namespace Nemundo\Webcam\Content\Region;

use Nemundo\Content\Type\AbstractContentType;

class RegionType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Region';
        $this->typeId = 'ec73ba53-531c-41fb-b35e-ae880b18b7e6';
        $this->formClassList[] = RegionForm::class;
        $this->viewClassList[] = RegionView::class;
        $this->adminClass = RegionAdmin::class;
        $this->itemClass = RegionItem::class;
    }
}