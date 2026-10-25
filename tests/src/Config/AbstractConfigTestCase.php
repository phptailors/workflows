<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Tailors\PHPUnit\RecursivelyKsortedArrayIdenticalToTrait;

/**
 * @internal
 */
abstract class AbstractConfigTestCase extends TestCase
{
    use RecursivelyKsortedArrayIdenticalToTrait;

    /**
     * @return iterable<array{inputs:array, expect:array}>
     */
    abstract public static function provideWithValidConfig(): iterable;

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    abstract public static function provideWithInvalidConfig(): iterable;

    /**
     * @param array $inputs
     * @param array $expect
     */
    #[DataProvider('provideWithValidConfig')]
    public function testWithValidConfig(array $inputs, array $expect): void
    {
        $processor = new Processor();
        $config = new BackwardCompatibilityCheckConfig();

        try {
            $processedConfig = $processor->processConfiguration($config, $inputs);
        } catch (InvalidConfigurationException $exception) {
            $this->fail('Invalid configuration. '.$exception->getMessage());
        }

        $expect = \array_replace_recursive(static::configDefaults(), $expect);
        $this->assertRecursivelyKsortedArrayIdenticalTo($expect, $processedConfig);
    }

    /**
     * @param array $inputs
     */
    #[DataProvider('provideWithInvalidConfig')]
    public function testWithInvalidConfig(array $inputs, string $expect): void
    {
        $processor = new Processor();
        $config = new BackwardCompatibilityCheckConfig();

        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessageMatches($expect);

        $processedConfig = $processor->processConfiguration($config, $inputs);
    }

    /**
     * @psalm-return array{
     *      srcript?: string,
     *      options?: array<string,mixed>,
     *      arguments?: list<string>
     * }
     */
    abstract protected static function configDefaults(): array;
}
