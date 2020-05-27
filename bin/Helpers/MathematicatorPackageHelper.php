<?php

declare(strict_types=1);

namespace Mathematicator\Meta\Bin\Helpers;

/**
 * @internal
 */
class MathematicatorPackageHelper
{

	/**
	 * @param string $libsDir
	 * @return string[]
	 */
	public static function getAllPackageNames(string $libsDir): array
	{
		$libs = [];

		$scanDirOut = scandir($libsDir);

		if ($scanDirOut) {
			foreach ($scanDirOut as $scanDir) {
				if (!in_array($scanDir, ['.', '..'], true) && is_dir("$libsDir/$scanDir")) {
					$libs[] = $scanDir;
				}
			}
		}

		return $libs;
	}
}
