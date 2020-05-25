<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Mathematicator\Meta\Bin\Commands\CodeCheckerInstall;
use Mathematicator\Meta\Bin\Commands\CodingStandardInstall;
use Mathematicator\Meta\Bin\Commands\ComposerBulk;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new CodeCheckerInstall());
$application->add(new CodingStandardInstall());
$application->add(new ComposerBulk());

$application->run();
