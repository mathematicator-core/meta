<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Helpers;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * @internal
 */
class CommandHelper
{

	/**
	 * @param string|string[] $cmd
	 * @param OutputInterface|null $output
	 * @throws ProcessFailedException
	 */
	public static function run($cmd, ?OutputInterface $output = null): void
	{
		if (!is_array($cmd)) {
			$cmd = self::parseCmd($cmd);
		}

		if ($output) {
			$output->writeln(['', '▩ Running command: ' . implode(' ', $cmd), '']);
		}

		$process = new Process($cmd);

		if ($output) {
			$process->start();
			foreach ($process as $type => $data) {
				$output->writeln($data);
			}
		} else {
			$process->run();
		}

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}
	}


	/**
	 * @param string $cmd
	 * @return string[]
	 */
	public static function parseCmd(string $cmd): array
	{
		return explode(' ', $cmd);
	}
}
