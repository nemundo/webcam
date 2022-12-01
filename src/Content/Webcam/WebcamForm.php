<?php

namespace Nemundo\Webcam\Content\Webcam;

use Nemundo\Admin\Com\Form\Geo\AdminGeoCoordinateTextBox;
use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\ListBox\AdminNumberBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Webcam\Com\ListBox\PublicationStatusListBox;
use Nemundo\Webcam\Com\ListBox\SourceListBox;
use Nemundo\Webcam\Data\Webcam\WebcamModel;
use Nemundo\Webcam\Type\Publication\DraftPublication;

class WebcamForm extends AbstractContentForm
{

    /**
     * @var PublicationStatusListBox
     */
    private $publicationStatus;

    /**
     * @var AdminTextBox
     */
    private $webcam;

    /**
     * @var AdminLargeTextBox
     */
    private $description;

    /**
     * @var AdminNumberBox
     */
    private $direction;

    /**
     * @var AdminTextBox
     */
    private $imageUrl;

    /**
     * @var SourceListBox
     */
    private $sourceList;

    /**
     * @var AdminTextBox
     */
    //private $source;

    /**
     * @var AdminTextBox
     */
    //private $sourceUrl;

    /**
     * @var AdminGeoCoordinateTextBox
     */
    private $geoCoordinate;


    public function getContent()
    {

        $model = new WebcamModel();
        $model->loadSource();

        $this->publicationStatus = new PublicationStatusListBox($this);
        $this->publicationStatus->value = (new DraftPublication())->id;

        $this->webcam = new AdminTextBox($this);
        $this->webcam->label = $model->webcam->label;
        $this->webcam->validation = true;

        $this->description = new AdminLargeTextBox($this);
        $this->description->label = $model->description->label;

        $this->direction = new AdminNumberBox($this);
        $this->direction->label = $model->direction->label;

        $this->imageUrl = new AdminTextBox($this);
        $this->imageUrl->label = $model->imageUrl->label;
        $this->imageUrl->validation = true;

        $this->sourceList = new SourceListBox($this);

        /*$this->source = new AdminTextBox($this);
        $this->source->label = $model->source->label;

        $this->sourceUrl = new AdminTextBox($this);
        $this->sourceUrl->label = 'Source Url';  // $model->webcam->label;*/

        $geoCoordinate = new GeoCoordinate();
        $geoCoordinate->latitude = 47.01955507337898;
        $geoCoordinate->longitude = 8.407829706475265;

        $this->geoCoordinate = new AdminGeoCoordinateTextBox($this);
        $this->geoCoordinate->label = $model->geoCoordinate->label;
        $this->geoCoordinate->setGeoCoordinate($geoCoordinate);

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $webcamRow = (new WebcamItem($this->dataId))->getDataRow();

        $this->publicationStatus->value = $webcamRow->publicationStatusId;
        $this->webcam->value = $webcamRow->webcam;
        $this->description->value = $webcamRow->description;
        $this->direction->value = $webcamRow->direction;
        $this->imageUrl->value = $webcamRow->imageUrl;
        $this->sourceList->value = $webcamRow->sourceId;
        /*$this->source->value = $webcamRow->source->source;
        $this->sourceUrl->value = $webcamRow->source->url;*/
        $this->geoCoordinate->setGeoCoordinate($webcamRow->geoCoordinate);

    }


    protected function onSave()
    {

        $builder = new WebcamBuilder($this->dataId);
        $builder->publicationStatusId = $this->publicationStatus->getValue();
        $builder->webcam = $this->webcam->getValue();
        $builder->description = $this->description->getValue();
        $builder->direction = $this->direction->getValue();
        $builder->imageUrl = $this->imageUrl->getValue();
        $builder->sourceId = $this->sourceList->getValue();
        /*$builder->source = $this->source->getValue();
        $builder->sourceUrl = $this->sourceUrl->getValue();*/
        $builder->geoCoordinate = $this->geoCoordinate->getGeoCoordinate();
        $builder->buildContent();

    }
}