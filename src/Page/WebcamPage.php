<?php

namespace Nemundo\Webcam\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
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
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Webcam\Com\ListBox\PublicationStatusListBox;
use Nemundo\Webcam\Com\ListBox\SourceListBox;
use Nemundo\Webcam\Com\Tab\WebcamTab;
use Nemundo\Webcam\Data\Image\ImageModel;
use Nemundo\Webcam\Data\Webcam\WebcamPaginationReader;
use Nemundo\Webcam\Parameter\SourceParameter;
use Nemundo\Webcam\Parameter\WebcamParameter;
use Nemundo\Webcam\Site\Csv\WebcamCsvSite;
use Nemundo\Webcam\Site\ImageCroppingSite;
use Nemundo\Webcam\Site\ImageDeleteSite;
use Nemundo\Webcam\Site\Json\WebcamJsonSite;
use Nemundo\Webcam\Site\Kml\WebcamKmlSite;
use Nemundo\Webcam\Site\WebcamDeleteSite;
use Nemundo\Webcam\Site\WebcamEditSite;
use Nemundo\Webcam\Site\WebcamItemSite;
use Nemundo\Webcam\Site\WebcamLogSite;
use Nemundo\Webcam\Site\WebcamNewSite;

class WebcamPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        new WebcamTab($layout);

        $form = new AdminSearchForm($layout);

        $source = new SourceListBox($form);
        $source->submitOnChange = true;
        $source->searchMode = true;

        $publicationStatus = new PublicationStatusListBox($form);
        $publicationStatus->submitOnChange= true;
        $publicationStatus->searchMode= true;

        $rowLayout = new AdminRowFlexLayout($layout);


        $btn = new AdminIconSiteButton($rowLayout);
        $btn->site = WebcamNewSite::$site;

        $btn = new AdminIconSiteButton($rowLayout);
        $btn->site = WebcamCsvSite::$site;

        $btn = new AdminIconSiteButton($rowLayout);
        $btn->site = WebcamKmlSite::$site;



        $site = clone(WebcamJsonSite::$site);
        $site->addParameter(new SourceParameter());

        $copy = new CopyTextBox($rowLayout);
        $copy->label = 'Json Web Service';
        $copy->value = $site->getUrlWithDomain();


        $table = new AdminTable($layout);

        $webcamReader = new WebcamPaginationReader();
        $webcamReader->model->loadPublicationStatus();
        $webcamReader->model->loadSource();
        $webcamReader->model->loadLatestImage();

        if ($publicationStatus->hasValue()) {
            $webcamReader->filter->andEqual($webcamReader->model->publicationStatusId, $publicationStatus->getValue());
        }

        if ($source->hasValue()) {
            $webcamReader->filter->andEqual($webcamReader->model->sourceId, $source->getValue());
        }




        $header = new TableHeader($table);
        $header->addText($webcamReader->model->publicationStatus->label);
        $header->addText($webcamReader->model->active->label);
        $header->addEmpty();
        $header->addText($webcamReader->model->latestImage->label);
        $header->addText($webcamReader->model->webcam->label);
        $header->addText($webcamReader->model->description->label);
        $header->addText($webcamReader->model->imageWidth->label);
        $header->addText($webcamReader->model->imageHeight->label);
        $header->addText($webcamReader->model->source->label);
        $header->addText($webcamReader->model->imageUrl->label);
        //$header->addText($webcamReader->model->geoCoordinate->label);
        $header->addEmpty(2);

        foreach ($webcamReader->getData() as $webcamRow) {

            $row = new AdminTableRow($table);


            $row->addText($webcamRow->croppingImage->getCroppingDimension()->width);


            //$row->addText($webcamRow->webcam);
            $row->addText($webcamRow->publicationStatus->publicationStatus);
            $row->addYesNo($webcamRow->active);

            $site = clone(WebcamItemSite::$site);
            $site->addParameter(new WebcamParameter($webcamRow->id));
            $site->title = $webcamRow->webcam;


            //if ($webcamRow->active) {

                $hyperlink = new AdminSiteHyperlinkContainer($row);
                $hyperlink->site = $site;

                $model = new ImageModel();

                $img = new AdminImage($hyperlink);
                $img->src = $webcamRow->latestImage->image->getImageUrl($model->imageAutoSize500);

            $img = new AdminImage($hyperlink);
            $img->src = $webcamRow->latestImage->squareImage->getImageUrl($model->squareImageAutoSize500);

                $row->addText($webcamRow->latestImage->dateTime->getShortDateTimeLeadingZeroFormat());

            /*} else {

                $row->addEmpty(2);

            }*/

            $hyperlink = new SiteHyperlink($row);
            $hyperlink->site = $site;

            $row->addText($webcamRow->description);

            $row->addText($webcamRow->imageWidth);
            $row->addText($webcamRow->imageHeight);

            //$row->addText($webcamRow->source->source);

            $url = new UrlHyperlink($row);
            $url->openNewWindow = true;
            $url->content = $webcamRow->source->source;  //$webcamRow->source->url;
            $url->url = $webcamRow->source->url;


            $url = new UrlHyperlink($row);
            $url->openNewWindow = true;
            $url->content = 'Bild';  // $webcamRow->imageUrl;
            $url->url = $webcamRow->imageUrl;

            //$row->addText($webcamRow->geoCoordinate->getText());


            $site = clone(ImageCroppingSite::$site);
            $site->addParameter(new WebcamParameter($webcamRow->id));
            $row->addSite($site);


            $site = clone(WebcamLogSite::$site);
            $site->addParameter(new WebcamParameter($webcamRow->id));
            $row->addSite($site);


            $site = clone(WebcamEditSite::$site);
            $site->addParameter(new WebcamParameter($webcamRow->id));
            $row->addIconSite($site);


            $site = clone(ImageDeleteSite::$site);
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