<?php

namespace Nemundo\Webcam\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Csv\Reader\CsvReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Project\Path\SourcePath;
use Nemundo\Webcam\Content\Webcam\WebcamBuilder;

class SourceImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'webcam-source-import';
    }

    public function run()
    {


        $filename = (new SourcePath())
            ->addPath('webcam.csv')
            ->getFullFilename();


        (new Debug())->write($filename);

        $reader = new CsvReader();
        $reader->filename = $filename;
        foreach ($reader->getData() as $csvRow) {

            $builder = new WebcamBuilder();
            $builder->webcam = $csvRow->getValue('webcam');
            $builder->imageUrl = $csvRow->getValue('image_url');
            $builder->source = $csvRow->getValue('source');
            $builder->sourceUrl = $csvRow->getValue('source_url');
            $builder->buildContent();

        }

    }
}