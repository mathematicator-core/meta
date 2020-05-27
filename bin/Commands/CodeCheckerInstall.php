<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Commands;

use Mathematicator\Meta\Bin\Helpers\CommandHelper;
use Mathematicator\Meta\Bin\Helpers\PathHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class CodeCheckerInstall extends Command
{
	protected static $defaultName = 'app:code-checker:install';

	/** @var string */
	private $codeCheckerDir;

	/** @var Filesystem */
	private $filesystem;


	public function __construct(string $name = null)
	{
		parent::__construct($name);

		$this->filesystem = new Filesystem();

		$this->codeCheckerDir = PathHelper::realPath(__DIR__ . '/../../temp', true) . '/code-checker';
	}


	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$codeCheckerDir = $this->codeCheckerDir;

		if ($this->filesystem->exists($codeCheckerDir)) {
			$output->writeln("Directory \"$codeCheckerDir\" already exists.");

			CommandHelper::run(['composer', 'install', '-d', $codeCheckerDir], $output);
		} else {
			CommandHelper::run(['composer', 'create-project', 'nette/code-checker', $codeCheckerDir, '^3', '--no-progress'], $output);
		}

		return 0;
	}
}
