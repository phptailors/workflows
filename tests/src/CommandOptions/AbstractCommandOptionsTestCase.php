<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions;

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
abstract class AbstractCommandOptionsTestCase extends TestCase
{
    use RecursivelyKsortedArrayIdenticalToTrait;

    /**
     * @return iterable<array{inputs:array, expect:array}>
     */
    abstract public static function provideWithValidCommandOptions(): iterable;

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    abstract public static function provideWithInvalidCommandOptions(): iterable;

    /**
     * @param array $inputs
     * @param array $expect
     */
    #[DataProvider('provideWithValidCommandOptions')]
    public function testWithValidCommandOptions(array $inputs, array $expect): void
    {
        $processor = new Processor();

        $treeBuilder = new TreeBuilder('options');

        $rootNode = $treeBuilder->getRootNode();

        $rootBuilder = $rootNode->children();

        $this->assertSame($rootBuilder, static::getCommandOptionsDefinition()->addOptionsDefinitions($rootBuilder));

        $rootBuilder->end();

        $config = new class($treeBuilder) implements ConfigurationInterface {
            public function __construct(private TreeBuilder $treeBuilder) {}
            public function getConfigTreeBuilder(): TreeBuilder {
                return $this->treeBuilder;
            }
        };

        try {
            $processedConfig = $processor->processConfiguration($config, $inputs);
        } catch (InvalidConfigurationException $exception) {
            $this->fail('Invalid configuration. '.$exception->getMessage());
        }

        $expect = \array_replace_recursive(static::getCommandOptionsDefaults(), $expect);
        $this->assertRecursivelyKsortedArrayIdenticalTo($expect, $processedConfig);
    }

    /**
     * @param array $inputs
     */
    #[DataProvider('provideWithInvalidCommandOptions')]
    public function testWithInvalidCommandOptions(array $inputs, string $expect): void
    {
        $processor = new Processor();

        $treeBuilder = new TreeBuilder('options');

        $rootNode = $treeBuilder->getRootNode();

        $rootBuilder = $rootNode->children();

        $this->assertSame($rootBuilder, static::getCommandOptionsDefinition()->addOptionsDefinitions($rootBuilder));

        $rootBuilder->end();

        $config = new class($treeBuilder) implements ConfigurationInterface {
            public function __construct(private TreeBuilder $treeBuilder) {}
            public function getConfigTreeBuilder(): TreeBuilder {
                return $this->treeBuilder;
            }
        };

        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessageMatches($expect);

        $processedConfig = $processor->processConfiguration($config, $inputs);
    }

    /**
     * @psalm-return array<string,mixed>
     */
    abstract protected static function getCommandOptionsDefaults(): array;

    abstract protected static function getCommandOptionsDefinition(): CommandOptionsDefinitionInterface;
}
