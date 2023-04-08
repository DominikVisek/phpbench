<?php

declare(strict_types=1);

namespace Benchmarks\Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * @Revs(1000)
 * @Iterations(8)
 * @OutputTimeUnit("milliseconds", precision=10)
 */
final class CheckIfValueIsInArrayBench extends BaseBench
{
    final public const RANDOM_ARRAY = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3',
        '4', '5', '6', '7', '8', '9', '!', '@', '#', '$',
        '%', '^', '&', '*', '(', ')', '-', '_', '=', '+',
        '[', ']', '{', '}', ';', ':', '"', "'", '<', '>',
        ',', '.', '?', '/', 'ab', 'cd', 'ef', 'gh', 'ij',
        'kl', 'mn', 'op', 'qr', 'st', 'uv', 'wx', 'yz', '01', '23',
        '45', '67', '89', '90', 'ab', 'cd', 'ef', 'gh', 'ij', 'kl',
        'mn', 'op', 'qr', 'st', 'uv', 'wx', 'yz', '01', '23', '45',
        '67', '89', '90', 'ab', 'cd', 'ef', 'gh', 'ij', 'kl', 'mn',
        'op', 'qr', 'st', 'uv', 'wx', 'yz', '01', '23', '45', '67',
        '89', '90', 'ab', 'cd', 'ef', 'gh', 'ij', 'kl', 'mn', 'op',
        'qr', 'st', 'uv', 'wx', 'yz', '01', '23', '45', '67', '89',
        '90', 'ab', 'cd', 'ef', 'gh', 'ij', 'kl', 'mn', 'op', 'qr',
        'st', 'uv', 'wx', 'yz', '01', '23', '45', '67', '89', '90',
    ];

    public function benchInArray()
    {
        foreach (self::RANDOM_ARRAY as $value) {
            $output = in_array($value, self::RANDOM_ARRAY);
            $this->assertSame($output, true);
        }
    }

    public function benchInArrayStrict()
    {
        foreach (self::RANDOM_ARRAY as $value) {
            $output = in_array($value, self::RANDOM_ARRAY, true);
            $this->assertSame($output, true);
        }
    }

    public function benchArraySearch()
    {
        foreach (self::RANDOM_ARRAY as $value) {
            $output = array_search($value, self::RANDOM_ARRAY) !== false;
            $this->assertSame($output, true);
        }
    }

    public function benchArraySearchStrict()
    {
        foreach (self::RANDOM_ARRAY as $value) {
            $output = array_search($value, self::RANDOM_ARRAY, true) !== false;
            $this->assertSame($output, true);
        }
    }

    public function benchArrayKeyExists()
    {
        foreach (self::RANDOM_ARRAY as $value) {
            $output = array_key_exists($value, array_flip(self::RANDOM_ARRAY));
            $this->assertSame($output, true);
        }
    }

    public function benchArrayKeyExistsWithArrayFillKeys()
    {
        foreach (self::RANDOM_ARRAY as $value) {
            $output = array_key_exists($value, array_fill_keys(self::RANDOM_ARRAY, self::RANDOM_ARRAY));
            $this->assertSame($output, true);
        }
    }

    public function benchArrayKeyExistsWithArrayFlip()
    {
        foreach (self::RANDOM_ARRAY as $value) {
            $output = (array_flip(self::RANDOM_ARRAY)[$value] ?? false) !== false;
            $this->assertSame($output, true);
        }
    }

    public function benchByForeach()
    {
        $output = false;
        foreach (self::RANDOM_ARRAY as $value) {
            foreach (self::RANDOM_ARRAY as $value2) {
                if ($value === $value2) {
                    $output = true;

                    break;
                }
            }
            $this->assertSame($output, true);
        }
    }

    public function benchByPreparedKeysFlipped()
    {
        $keys = array_flip(self::RANDOM_ARRAY);
        foreach (self::RANDOM_ARRAY as $value) {
            $output = array_key_exists($value, $keys);
            $this->assertSame($output, true);
        }
    }

    public function benchByPreparedKeysFlipped2()
    {
        $keys = array_flip(self::RANDOM_ARRAY);
        foreach (self::RANDOM_ARRAY as $value) {
            $output = ($keys[$value] ?? false) !== false;
            $this->assertSame($output, true);
        }
    }

    public function benchByPreparedKeysFlipped3()
    {
        $keys = array_flip(self::RANDOM_ARRAY);
        foreach (self::RANDOM_ARRAY as $value) {
            $output = isset($keys[$value]);
            $this->assertSame($output, true);
        }
    }

    public function benchByPreparedKeysFlipped4()
    {
        $keys = [];
        foreach (self::RANDOM_ARRAY as $key => $value) {
            $keys[$value] = $key;
        }

        foreach (self::RANDOM_ARRAY as $value) {
            $output = ($keys[$value] ?? false) !== false;
            $this->assertSame($output, true);
        }
    }

    public function benchByPreparedKeysFlipped5()
    {
        $keys = [];
        foreach (self::RANDOM_ARRAY as $key => $value) {
            $keys[$value] = $key;
        }

        foreach (self::RANDOM_ARRAY as $value) {
            $output = isset($keys[$value]);
            $this->assertSame($output, true);
        }
    }
}
