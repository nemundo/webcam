<?php

namespace Nemundo\Webcam\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\Webcam\Data\PublicationStatus\PublicationStatusReader;

class PublicationStatusListBox extends AdminListBox
{
    public function getContent()
    {

        $this->label = 'PublicationStatus';

        $reader = new PublicationStatusReader();
        foreach ($reader->getData() as $publicationStatusRow) {
            $this->addItem($publicationStatusRow->id, $publicationStatusRow->publicationStatus);
        }

        return parent::getContent();
    }
}