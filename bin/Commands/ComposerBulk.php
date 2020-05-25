<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ComposerBulk extends Command
{

	protected static $defaultName = 'app:composer:bulk';

	private $libsDir;

	public function __construct(string $name = null)
	{
		parent::__construct($name);

		$this->libsDir = realpath(__DIR__ . '/../../libs');
	}

	protected function configure()
	{
		$this
			->setDescription('Bulk composer operation')
			->setHelp('Run bulk composer operation for all repositories.')
			->addArgument('composerCommand', InputArgument::REQUIRED, 'Composer command')
			->addArgument('composerParams', InputArgument::OPTIONAL, 'Composer params');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$libs = [];

		foreach (scandir($this->libsDir) as $scanDir) {
			if (!in_array($scanDir, ['.', '..']) && is_dir("$this->libsDir/$scanDir")) {
				$libs[] = $scanDir;
			}
		}

		$arguments = $input->getArguments();

		foreach ($libs as $lib) {
			$execCmd = "composer $arguments[composerCommand] $arguments[composerParams] -d libs/$lib";

			exec($execCmd);
		}

		return 0;
	}
}
