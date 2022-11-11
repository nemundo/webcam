<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Copy\CopyTextBox;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Image\AdminImage;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\ListBox\SourceListBox;
use Nemundo\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Site\Csv\WebcamCsvSite;
use Nemundo\Webcam\Site\Json\WebcamJsonSite;
use Nemundo\Webcam\Site\WebcamItemSite;
use Nemundo\Webcam\Site\WebcamNewSite;

class WebcamPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        $form = new AdminSearchForm($layout);

        $source = new SourceListBox($form);
        $source->submitOnChange=true;
        $source->searchMode=true;


        $btn = new AdminIconSiteButton($layout);
        $btn->site= WebcamNewSite::$site;

        $btn = new AdminIconSiteButton($layout);
        $btn->site= WebcamCsvSite::$site;

        $copy = new CopyTextBox($layout);
        $copy->value = WebcamJsonSite::$site->getUrlWithDomain();


        $table = new AdminTable($layout);

        $webcamReader = new WebcamPaginationReader();
        $webcamReader->model->loadSource();

        $header = new TableHeader($table);
        $header->addText($webcamReader->model->webcam->label);

        $header->addText($webcamReader->model->source->label);
        $header->addText($webcamReader->model->imageUrl->label);
        $header->addText($webcamReader->model->geoCoordinate->label);

        foreach ($webcamReader->getData() as $webcamRow) {

            $row = new AdminTableRow($table);
            //$row->addText($webcamRow->webcam);
            //$row->addText($webcamRow->source->source);

            $site = clone(WebcamItemSite::$site);
            $site->addParameter(new WebcamParameter($webcamRow->id));
            $site->title = $webcamRow->webcam;

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = $site;

            $row->addText($webcamRow->source->source);

            $url = new UrlHyperlink($row);
            $url->openNewWindow= true;
            $url->content = $webcamRow->source->url;  // $webcamRow->source->source;
            $url->url = $webcamRow->source->url;

            $row->addText($webcamRow->imageUrl);

            /*$img = new AdminImage($row);
            $img->src = $webcamRow->imageUrl;*/

            $row->addText($webcamRow->geoCoordinate->getText());

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $webcamReader;

        return parent::getContent();
    }
}