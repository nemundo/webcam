<?php

namespace Nemundo\Webcam\Content\Region;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Webcam\Data\Region\RegionModel;

class RegionForm extends AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    private $region;

    public function getContent()
    {

        $model = new RegionModel();

        $this->region = new AdminTextBox($this);
        $this->region->label = $model->region->label;
        $this->region->validation = true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $regionRow = (new RegionItem($this->dataId))->getDataRow();
        $this->region->value = $regionRow->region;

    }


    protected function onSave()
    {

        $builder = new RegionBuilder($this->dataId);
        $builder->region=$this->region->getValue();
        $builder->buildContent();

    }
}