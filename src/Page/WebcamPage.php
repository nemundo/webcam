<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Copy\CopyTextBox;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Hyperlink\AdminSiteHyperlinkContainer;
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
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Data\Image\ImageModel;
use Nemundo\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Site\Csv\WebcamCsvSite;
use Nemundo\Webcam\Site\Json\WebcamJsonSite;
use Nemundo\Webcam\Site\Kml\WebcamKmlSite;
use Nemundo\Webcam\Site\WebcamDeleteSite;
use Nemundo\Webcam\Site\WebcamEditSite;
use Nemundo\Webcam\Site\WebcamItemSite;
use Nemundo\Webcam\Site\WebcamNewSite;

class WebcamPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);

        $form = new AdminSearchForm($layout);

        $source = new SourceListBox($form);
        $source->submitOnChange=true;
        $source->searchMode=true;


        $btn = new AdminIconSiteButton($layout);
        $btn->site= WebcamNewSite::$site;

        $btn = new AdminIconSiteButton($layout);
        $btn->site= WebcamCsvSite::$site;

        $btn = new AdminIconSiteButton($layout);
        $btn->site= WebcamKmlSite::$site;



        $copy = new CopyTextBox($layout);
        $copy->label = 'Json Web Service';
        $copy->value = WebcamJsonSite::$site->getUrlWithDomain();


        $table = new AdminTable($layout);

        $webcamReader = new WebcamPaginationReader();
        $webcamReader->model->loadPublicationStatus();
        $webcamReader->model->loadSource();
        $webcamReader->model->loadLatestImage();

        $header = new TableHeader($table);
        $header->addText($webcamReader->model->publicationStatus->label);
        $header->addText($webcamReader->model->active->label);
        $header->addText($webcamReader->model->webcam->label);
        $header->addText($webcamReader->model->description->label);
        $header->addText($webcamReader->model->source->label);
        $header->addText($webcamReader->model->imageUrl->label);
        $header->addText($webcamReader->model->geoCoordinate->label);

        foreach ($webcamReader->getData() as $webcamRow) {

            $row = new AdminTableRow($table);

            //$row->addText($webcamRow->latestImage->image->getUrl());

            //$row->addText($webcamRow->webcam);
            $row->addText($webcamRow->publicationStatus->publicationStatus);
            $row->addYesNo($webcamRow->active);

            $site = clone(WebcamItemSite::$site);
            $site->addParameter(new WebcamParameter($webcamRow->id));
            $site->title = $webcamRow->webcam;


            if ($webcamRow->active) {

            $hyperlink =new AdminSiteHyperlinkContainer($row);
            $hyperlink->site = $site;

            $model = new ImageModel();

            $img = new AdminImage($hyperlink);
            //$img->src = $webcamRow->latestImage->image->getUrl();  // getImageUrl($model->imageAutoSize500);
            $img->src = $webcamRow->latestImage->image->getImageUrl($model->imageAutoSize500);

            $row->addText($webcamRow->latestImage->dateTime->getShortDateTimeLeadingZeroFormat());

            } else {

                $row->addEmpty(2);

            }

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = $site;

            $row->addText($webcamRow->description);
            $row->addText($webcamRow->source->source);

            $url = new UrlHyperlink($row);
            $url->openNewWindow= true;
            $url->content = $webcamRow->source->url;
            $url->url = $webcamRow->source->url;


            $url = new UrlHyperlink($row);
            $url->openNewWindow= true;
            $url->content = $webcamRow->imageUrl;
            $url->url = $webcamRow->imageUrl;

            //$row->addText($webcamRow->geoCoordinate->getText());

            $site = clone(WebcamEditSite::$site);
            $site->addParameter(new WebcamParameter($webcamRow->id));
            $row->addIconSite($site);

            $site = clone(WebcamDeleteSite::$site);
            $site->addParameter(new WebcamParameter($webcamRow->id));
            $row->addIconSite($site);

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $webcamReader;

        return parent::getContent();
    }
}