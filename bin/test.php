<?php

require  "config.php";

$builder = new \Nemundo\Webcam\Content\Webcam\WebcamBuilder();
$builder->webcam='Gummenalp';
$builder->imageUrl='https://www.gummenalp.ch/livecam/gummenalp.jpg';
$builder->source= 'Restaurant Gummenalp';
$builder->sourceUrl = '';
$builder->buildContent();





