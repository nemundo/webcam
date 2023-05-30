<?php

require  "config.php";

$setup = new \Nemundo\Com\Package\Setup\PackageSetup();
$setup->destinationPath = (new \Nemundo\Project\Path\WebPath())->getPath();
$setup
    ->addPackage(new \Nemundo\Package\Framework\CoreJsPackage())
    ->addPackage(new \Nemundo\Package\Framework\HtmlJsPackage())
    ->addPackage(new \Nemundo\Package\Framework\FrameworkJsPackage())
    ->addPackage(new \Nemundo\Package\Framework\FrameworkCssPackage())
    ->addPackage(new \Nemundo\Package\FontAwesome\Package\FontAwesomePackage())
    ->addPackage(new \Nemundo\Package\CropperJs\CropperJsPackage())
    ->addPackage(new \Nemundo\Package\Jquery\Package\JqueryPackage())
    ->addPackage(new \Nemundo\Package\Fancybox\FancyboxPackage())
    ->addPackage(new \Nemundo\Package\OpenLayers\Package\OpenLayersPackage());
