<?php

declare(strict_types=1);

namespace Benchmarks\Benchmarks;

use InvalidArgumentException;

abstract class BaseBench
{
    protected function assertSame(mixed $value, mixed $expected): void
    {
        if ($expected !== $value) {
            throw new InvalidArgumentException('Inconsistent benchmark result');
        }
    }
}
