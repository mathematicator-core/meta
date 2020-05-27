<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Commands;

use Mathematicator\Meta\Bin\Helpers\CommandHelper;
use Mathematicator\Meta\Bin\Helpers\PathHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class CodingStandardInstall extends Command
{
	protected static $defaultName = 'app:coding-standard:install';

	/** @var string */
	private $codingStandardDir;

	/** @var Filesystem */
	private $filesystem;


	public function __construct(string $name = null)
	{
		parent::__construct($name);

		$this->filesystem = new Filesystem();
		$this->codingStandardDir = PathHelper::realPath(__DIR__ . '/../../temp/coding-standard', true);
	}


	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$codeCheckerDir = $this->codingStandardDir;

		if ($this->filesystem->exists($codeCheckerDir)) {
			$output->writeln("Directory \"$codeCheckerDir\" already exists.");

			CommandHelper::run(['composer', 'install', '-d', $codeCheckerDir], $output);
		} else {
			CommandHelper::run(['composer', 'create-project', 'nette/coding-standard', $codeCheckerDir, '^2', '--no-progress'], $output);
		}

		return 0;
	}
}
