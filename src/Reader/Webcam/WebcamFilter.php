<?php

namespace Nemundo\Webcam\Reader\Webcam;

use Nemundo\Webcam\Type\Publication\PublishedPublication;

trait WebcamFilter
{

    public $webcam;

    /**
     * @var bool
     */
    public $active;

    public $sourceId;

    public function loadModel()
    {


        $this->model->loadPublicationStatus();
        $this->model->loadSource();
        $this->model->loadRegion();
        $this->model->loadLatestImage();

    }


    protected function loadFilter()
    {

        $this->model->loadLatestImage();

        if ($this->webcam !== null) {
            $this->filter->andContains($this->model->webcam, $this->webcam);
        }

        if ($this->active !== null) {
            $this->filter->andEqual($this->model->publicationStatusId, (new PublishedPublication())->id);
            $this->filter->andEqual($this->model->active, $this->active);
        }

        if ($this->sourceId !== null) {
            $this->filter->andEqual($this->model->sourceId, $this->sourceId);
        }

        $this->addOrder($this->model->webcam);

    }

}