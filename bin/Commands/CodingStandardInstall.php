<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class CodingStandardInstall extends Command
{

	protected static $defaultName = 'app:cs:install';
	private $codingStandardDir;
	private $filesystem;

	public function __construct(string $name = null)
	{
		parent::__construct($name);

		$this->filesystem = new Filesystem();
		$this->codingStandardDir = realpath(__DIR__ . '/../../temp/coding-standard');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$codeCheckerDir = $this->codingStandardDir;

		if ($this->filesystem->exists($codeCheckerDir)) {
			echo "Directory \"$codeCheckerDir\" already exists.\n";

			exec("composer install -d $codeCheckerDir");
		} else {
			exec("composer create-project nette/coding-standard $codeCheckerDir ^2 --no-progress");
		}

		return 0;
	}
}
