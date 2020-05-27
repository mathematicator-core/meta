<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Commands;

use Mathematicator\Meta\Bin\Helpers\CommandHelper;
use Mathematicator\Meta\Bin\Helpers\MathematicatorPackageHelper;
use Mathematicator\Meta\Bin\Helpers\PathHelper;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ComposerBulk extends Command
{
	protected static $defaultName = 'app:composer:bulk';

	/** @var string */
	private $libsDir;


	public function __construct(string $name = null)
	{
		parent::__construct($name);

		$this->libsDir = PathHelper::realPath(__DIR__ . '/../../libs');
	}


	protected function configure(): void
	{
		$this
			->setDescription('Bulk composer operation')
			->setHelp('Run bulk composer operation for all repositories.')
			->addArgument('composerCommand', InputArgument::REQUIRED, 'Composer command')
			->addArgument('composerParams', InputArgument::OPTIONAL, 'Composer params');
	}


	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$libs = MathematicatorPackageHelper::getAllPackageNames($this->libsDir);

		$arguments = $input->getArguments();

		foreach ($libs as $lib) {
			$this->runCommand($arguments['composerCommand'], $arguments['composerParams'], $lib, $output);
		}

		return 0;
	}


	/**
	 * @param string|null $composerCommand
	 * @param string|null $composerParams
	 * @param string $lib
	 * @param OutputInterface $output
	 * @return void
	 */
	protected function runCommand(?string $composerCommand, ?string $composerParams, string $lib, OutputInterface $output): void
	{
		$cmd = ['composer'];
		if ($composerCommand) {
			$cmd = array_merge($cmd, explode(' ', $composerCommand));
		}
		if ($composerParams) {
			$cmd = array_merge($cmd, explode(' ', $composerParams));
		}
		array_push($cmd, '-d', "libs / $lib");

		CommandHelper::run($cmd, $output);
	}
}
