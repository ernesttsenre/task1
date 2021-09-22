<?php declare(strict_types=1);

namespace Ernesttsenre\Counter\Components;

use SplFileInfo;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Generator;

class Counter
{
    private const COUNT_FILENAME = 'count';

    public function sumCountInPath(string $path): int
    {
        $totalSum = 0;

        foreach ($this->iterateDirectory($path) as $filePath) {
            $totalSum += (int) file_get_contents($filePath);
        }

        return $totalSum;
    }

    private function iterateDirectory($path): Generator
    {
        $directoryIterator = new RecursiveDirectoryIterator($path);
        $recursiveIterator = new RecursiveIteratorIterator($directoryIterator);

        foreach ($recursiveIterator as $fileInfo) {
            /** @var SplFileInfo $fileInfo */
            if (!$fileInfo->isFile()) {
                continue;
            }

            if ($fileInfo->getFilename() !== self::COUNT_FILENAME) {
                continue;
            }

            yield $fileInfo->getPathname();
        }
    }
}
