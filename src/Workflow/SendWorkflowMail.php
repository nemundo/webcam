<?php

namespace Nemundo\Webcam\Workflow;

use Nemundo\App\Mail\Message\Mail\ActionMailMessage;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Webcam\Data\Source\SourceReader;
use Nemundo\Webcam\Parameter\SourceParameter;
use Nemundo\Webcam\Site\PublicWebcamSite;
use Nemundo\Webcam\Site\Workflow\WorkflowSourceSite;

class SendWorkflowMail extends AbstractBase
{

    public function sendMail() {




        $sourceReader = new SourceReader();
        foreach ($sourceReader->getData() as $sourceRow) {


            $mail = new ActionMailMessage();
            $mail->mailTo = 'urs.lang@onedigit.ch';
            $mail->subject = 'Webcam';

            $site = clone(WorkflowSourceSite::$site);
            $site->addParameter(new SourceParameter($sourceRow->id));



            $mail->mailContainer->mailText = 'Webcam ...';


            $mail->mailContainer->actionSite = $site;

            $mail->sendMail();


        }








    }



}