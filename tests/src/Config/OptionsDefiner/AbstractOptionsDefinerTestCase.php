<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config\OptionsDefiner;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Tailors\PHPUnit\RecursivelyKsortedArrayIdenticalToTrait;

/**
 * @internal
 */
abstract class AbstractOptionsDefinerTestCase extends TestCase
{
    use RecursivelyKsortedArrayIdenticalToTrait;

    /**
     * @psalm-return iterable<array{inputs: array, expect: array}>
     */
    abstract public static function provideWithValidOptions(): iterable;

    /**
     * @psalm-return iterable<array{inputs:array, expect: string}>
     */
    abstract public static function provideWithInvalidOptions(): iterable;

    /**
     * @return array
     */
    abstract protected static function optionsDefaults(): array;

    abstract protected static function getOptionsDefiner(): OptionsDefinerInterface;

    /**
     * @psalm-param array $inputs
     * @psalm-param array $expect
     */
    #[DataProvider('provideWithValidOptions')]
    public function testWithValidOptions(array $inputs, array $expect): void
    {
        $processor = new Processor();

        $config = static::getConfiguration();

        try {
            $processedConfig = $processor->processConfiguration($config, $inputs);
        } catch (InvalidConfigurationException $exception) {
            $this->fail('Invalid configuration. '.$exception->getMessage());
        }

        $expect = \array_replace_recursive(static::optionsDefaults(), $expect);
        $this->assertRecursivelyKsortedArrayIdenticalTo($expect, $processedConfig);
    }

    /**
     * @psalm-param array $inputs
     */
    #[DataProvider('provideWithInvalidOptions')]
    public function testWithInvalidOptions(array $inputs, string $expect): void
    {
        $processor = new Processor();

        $config = self::getConfiguration();

        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessageMatches($expect);

        $processedConfig = $processor->processConfiguration($config, $inputs);
    }

    private static function getConfiguration(): ConfigurationInterface
    {
        $optionsDefiner = static::getOptionsDefiner();

        return new class ($optionsDefiner) implements ConfigurationInterface {
            public function __construct(private OptionsDefinerInterface $optionsDefiner) {}

            public function getConfigTreeBuilder(): TreeBuilder {
                $treeBuilder = new TreeBuilder('options');

                $rootNode = $treeBuilder->getRootNode();

                $optionsBuilder = $rootNode->addDefaultsIfNotSet()->children();

                $this->optionsDefiner->addOptions($optionsBuilder);

                $optionsBuilder->end();

                return $treeBuilder;
            }
        };
    }
}
