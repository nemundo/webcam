<?php

namespace Nemundo\Webcam\Content\Source;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Webcam\Data\Source\SourceModel;

class SourceForm extends AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    private $source;

    /**
     * @var AdminTextBox
     */
    private $sourceUrl;

    /**
     * @var 
     */
    private $email;


    public function getContent()
    {

        $model = new SourceModel();

        $this->source = new AdminTextBox($this);
        $this->source->label = $model->source->label;
        $this->source->validation = true;

        $this->sourceUrl = new AdminTextBox($this);
        $this->sourceUrl->label = $model->url->label;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $sourceRow = (new SourceItem($this->dataId))->getDataRow();

        $this->source->value = $sourceRow->source;
        $this->sourceUrl->value = $sourceRow->url;

    }


    protected function onSave()
    {

        $builder = new SourceBuilder($this->dataId);
        $builder->source= $this->source->getValue();
        $builder->sourceUrl= $this->sourceUrl->getValue();
        $builder->buildContent();

    }
}