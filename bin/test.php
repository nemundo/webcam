<?php

require "config.php";

(new \Nemundo\Webcam\Application\WebcamApplication())->reinstallApp();

$builder = new \Nemundo\Webcam\Content\Webcam\WebcamBuilder();
$builder->webcam = 'Gummenalp';
$builder->imageUrl = 'https://www.gummenalp.ch/livecam/gummenalp.jpg';
$builder->source = 'Restaurant Gummenalp';
$builder->sourceUrl = '';
$builder->buildContent();



//$url = 'https://g0.ipcamlive.com/player/player.php?alias=solandmedia&amp;autoplay=1';
/*$url = 'https://camserver.ch/FullScreen.aspx?cam=k73l';
$filename = (new \Nemundo\Project\Path\TmpPath())->addPath('test.html')->getFullFilename();


(new \Nemundo\Core\WebRequest\CurlWebRequest())->downloadUrl($url,$filename);*/





