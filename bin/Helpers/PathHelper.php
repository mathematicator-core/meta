<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Helpers;

use Symfony\Component\Filesystem\Filesystem;

/**
 * @internal
 */
class PathHelper
{
	public static function realPath(string $path, bool $createDir = false): string
	{
		$filesystem = new Filesystem();

		if ($createDir && !$filesystem->exists($path)) {
			$filesystem->mkdir($path);
		}

		$realPath = realpath($path);

		if (!$realPath) {
			throw new \Exception("Path \"$path\" does not exist!");
		}

		return $realPath;
	}
}
