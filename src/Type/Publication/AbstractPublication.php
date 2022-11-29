<?php

namespace Nemundo\Webcam\Type\Publication;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractPublication extends AbstractBase
{

    public $id;

    public $publicationStatus;

    abstract protected function loadPublication();


    public function __construct()
    {

        $this->loadPublication();

    }


}