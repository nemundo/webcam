<?php

namespace Nemundo\Webcam\Reader\Filter;

use Nemundo\Webcam\Type\Publication\PublishedPublication;

trait WebcamFilter
{

    /**
     * @var bool
     */
    public $active;


    protected function loadFilter() {

        $this->model->loadSource();

        if ($this->active !==null) {
            $this->filter->andEqual($this->model->publicationStatusId,  (new PublishedPublication())->id);
            $this->filter->andEqual($this->model->active,$this->active);
        }

        $this->addOrder($this->model->webcam);

    }

}