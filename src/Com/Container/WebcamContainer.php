<?php

namespace Nemundo\Webcam\Com\Container;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Copy\CopyTextBox;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Hyperlink\AdminSiteHyperlinkContainer;
use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Layout\Flex\AdminRowFlexLayout;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Webcam\Com\ListBox\SourceListBox;
use Nemundo\Webcam\Content\Webcam\WebcamView;
use Nemundo\Webcam\Data\Image\ImageModel;
use Nemundo\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Reader\WebcamDataPaginationReader;
use Nemundo\Webcam\Reader\WebcamDataReader;
use Nemundo\Webcam\Site\Csv\WebcamCsvSite;
use Nemundo\Webcam\Site\Json\WebcamJsonSite;
use Nemundo\Webcam\Site\Kml\WebcamKmlSite;
use Nemundo\Webcam\Site\WebcamDeleteSite;
use Nemundo\Webcam\Site\WebcamEditSite;
use Nemundo\Webcam\Site\WebcamItemSite;
use Nemundo\Webcam\Site\WebcamNewSite;

class WebcamContainer extends AbstractHtmlContainer
{

    public function getContent()
    {

        $layout = new AdminRowFlexLayout($this);

        $webcamReader = new WebcamDataPaginationReader();
        $webcamReader->active=true;
        foreach ($webcamReader->getData() as $webcamRow) {

            $card = new AdminCard($layout);
            $card->cardTitle = $webcamRow->webcam;

            $view = new WebcamView($card);
            $view->dataId = $webcamRow->id;

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $webcamReader;

        return parent::getContent();

    }

}