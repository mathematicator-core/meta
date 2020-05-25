<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class CodeCheckerInstall extends Command
{

	protected static $defaultName = 'app:code-check:install';
	private $codeCheckerDir;
	private $filesystem;

	public function __construct(string $name = null)
	{
		parent::__construct($name);

		$this->filesystem = new Filesystem();
		$this->codeCheckerDir = realpath(__DIR__ . '/../../temp/code-checker');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$codeCheckerDir = $this->codeCheckerDir;

		if ($this->filesystem->exists($codeCheckerDir)) {
			echo "Directory \"$codeCheckerDir\" already exists.\n";

			exec("composer install -d $codeCheckerDir");
		} else {
			exec("composer create-project nette/code-checker $codeCheckerDir ^3 --no-progress");
		}

		return 0;
	}
}
