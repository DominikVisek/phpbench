<?php

declare(strict_types=1);

namespace Benchmarks\Benchmarks;

use InvalidArgumentException;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * @Revs(1000)
 * @Iterations(8)
 * @OutputTimeUnit("milliseconds", precision=10)
 */
final class StringSplittingBench
{
    final public const SUBJECT = 'group#foobar';

    public function benchStrStrSubstr()
    {
        $group = strstr(self::SUBJECT, '#', true);
        $foobar = substr(self::SUBJECT, strlen($group) + 1);

        $this->checkExpected($group, $foobar);
    }

    public function benchPregMatch()
    {
        preg_match('{^(.*?)#(.*)$}', self::SUBJECT, $matches);
        $this->checkExpected($matches[1], $matches[2]);
    }

    public function benchExplode()
    {
        $parts = explode('#', self::SUBJECT);
        $this->checkExpected($parts[0], $parts[1]);
    }

    private function checkExpected(string $group, string $foobar)
    {
        if ($group !== 'group' || $foobar !== 'foobar') {
            throw new InvalidArgumentException('Inconsistent benchmark result');
        }
    }
}
