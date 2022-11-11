<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Admin\Com\Form\Geo\AdminGeoCoordinateTextBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Webcam\Data\Webcam\WebcamModel;

class WebcamForm extends AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    private $webcam;

    /**
     * @var AdminTextBox
     */
    private $imageUrl;

    /**
     * @var AdminTextBox
     */
    private $source;

    /**
     * @var AdminTextBox
     */
    private $sourceUrl;

    /**
     * @var AdminGeoCoordinateTextBox
     */
    private $geoCoordinate;


    public function getContent()
    {

        $model = new WebcamModel();
        $model->loadSource();

        $this->webcam = new AdminTextBox($this);
        $this->webcam->label = $model->webcam->label;
        $this->webcam->validation= true;

        $this->imageUrl = new AdminTextBox($this);
        $this->imageUrl->label = $model->imageUrl->label;
        $this->imageUrl->validation=true;

        $this->source = new AdminTextBox($this);
        $this->source->label = $model->source->label;

        $this->sourceUrl = new AdminTextBox($this);
        $this->sourceUrl->label = 'Source Url';  // $model->webcam->label;

        $this->geoCoordinate = new AdminGeoCoordinateTextBox($this);
        $this->geoCoordinate->label = $model->geoCoordinate->label;

        return parent::getContent();

    }


    protected function onSave()
    {

        $builder = new WebcamBuilder();
        $builder->webcam= $this->webcam->getValue();
        $builder->imageUrl= $this->imageUrl->getValue();
        $builder->source= $this->source->getValue();
        $builder->sourceUrl = $this->sourceUrl->getValue();
        $builder->geoCoordinate=$this->geoCoordinate->getGeoCoordinate();
        $builder->buildContent();

    }
}