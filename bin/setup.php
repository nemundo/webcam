<?php

require  "config.php";

use Nemundo\Project\Install\ProjectInstall;
use Nemundo\Project\Reset\ProjectReset;

(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->createDatabase();

$reset = new ProjectReset();
$reset->reset();
(new ProjectInstall())->install();

(new \Nemundo\App\ModelDesigner\Application\ModelDesignerApplication())->installApp();
(new \Nemundo\Webcam\Application\WebcamApplication())->installApp();
(new \Nemundo\Content\Index\Geo\Application\GeoIndexApplication())->installApp();

$reset->remove();
