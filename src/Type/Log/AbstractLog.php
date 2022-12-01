<?php

namespace Nemundo\Webcam\Type\Log;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractLog extends AbstractBase
{

    public $id;

    public $type;

    abstract protected function loadLog();

    abstract public function getText($dataId);

    public function __construct()
    {
        $this->loadLog();
    }


    /*public function getText() {

        $text = 'no text';


    }*/

}