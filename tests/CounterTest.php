<?php declare(strict_types=1);

namespace Ernesttsenre\Counter\Tests;

use Ernesttsenre\Counter\Components\Counter;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    public function testSumCountInPath(): void
    {
        $fixturesRootPath = __DIR__ . '/fixtures/CounterTest';
        
        $task1 = new Counter();

        self::assertEquals(3248, $task1->sumCountInPath($fixturesRootPath));
        self::assertEquals(2113, $task1->sumCountInPath($fixturesRootPath . '/dir2'));
        self::assertEquals(12, $task1->sumCountInPath($fixturesRootPath . '/dir1/dir1.2'));
    }
}
