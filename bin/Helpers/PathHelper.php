<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Helpers;

/**
 * @internal
 */
class PathHelper
{
	public static function realPath(string $path): string
	{
		$realPath = realpath($path);

		if (!$realPath) {
			throw new \Exception("Path \"$path\" does not exist!");
		}

		return $realPath;
	}
}
