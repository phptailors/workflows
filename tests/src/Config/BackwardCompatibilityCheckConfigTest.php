<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Tailors\PHPUnit\RecursivelyKsortedArrayIdenticalToTrait;

/**
 * @internal
 */
#[CoversClass(BackwardCompatibilityCheckConfig::class)]
#[CoversClass(BackwardCompatibilityCheckConfigTest::class)]
final class BackwardCompatibilityCheckConfigTest extends TestCase
{
    use RecursivelyKsortedArrayIdenticalToTrait;

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
            $this->fail("Invalid configuration. ".$exception->getMessage());
        }

        $expect = \array_replace_recursive(self::configDefaults(), $expect);
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
     * @return iterable<array{inputs:array, expect:array}>
     */
    public static function provideWithValidConfig(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [[]],
            'expect' => [],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => 'FOO']],
            'expect' => ['script' => 'FOO'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => 'FOO'], ['script' => 'BAR']],
            'expect' => ['script' => 'BAR'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'roave-backwards-compatibility-check:assert-backwards-compatible']],
            'expect' => ['command' => 'roave-backwards-compatibility-check:assert-backwards-compatible'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => []]],
            'expect' => [],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => null]]],
            'expect' => ['options' => ['no_interactions' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => true]]],
            'expect' => ['options' => ['no_interactions' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => false]]],
            'expect' => ['options' => ['no_interactions' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => null]]],
            'expect' => ['options' => ['ansi' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => true]]],
            'expect' => ['options' => ['ansi' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => false]]],
            'expect' => ['options' => ['ansi' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['from' => null]]],
            'expect' => ['options' => ['from' => '']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['from' => 'FOO']]],
            'expect' => ['options' => ['from' => 'FOO']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['to' => null]]],
            'expect' => ['options' => ['to' => '']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['to' => 'FOO']]],
            'expect' => ['options' => ['to' => 'FOO']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['install_development_dependencies' => null]]],
            'expect' => ['options' => ['install_development_dependencies' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['install_development_dependencies' => true]]],
            'expect' => ['options' => ['install_development_dependencies' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['install_development_dependencies' => false]]],
            'expect' => ['options' => ['install_development_dependencies' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'console']]],
            'expect' => ['options' => ['format' => 'console']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'markdown']]],
            'expect' => ['options' => ['format' => 'markdown']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'github-actions']]],
            'expect' => ['options' => ['format' => 'github-actions']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'github-actions']]],
            'expect' => ['options' => ['format' => 'github-actions']],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    public static function provideWithInvalidConfig(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => null]],
            'expect' => '/"backward_compatibility_check\.script" cannot contain an empty value/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => null]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "backward_compatibility_check\.command"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "backward_compatibility_check\.command"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['inexistent_option' => null]]],
            'expect' => '/Unrecognized option "inexistent_option" under "backward_compatibility_check\.options"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => 'FOO']]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.no_interactions"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => 'FOO']]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.ansi"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['from' => 123]]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.from"\. Expected "string", but got "int"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['to' => 123]]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.to"\. Expected "string", but got "int"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['install_development_dependencies' => 123]]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.install_development_dependencies"\. Expected "bool", but got "int"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 123]]],
            'expect' => '/The value 123 is not allowed for path "backward_compatibility_check\.options\.format"\./',
        ];
    }

    /**
     * @psalm-return array{
     *      srcipt: string,
     *      options: array<string,mixed>,
     *      arguments: list<string>
     * }
     */
    private static function configDefaults(): array
    {
        return [
            'script'    => 'roave-backward-compatibility-check',
            'options'   => [
                'no_interactions' => true,
                'ansi'            => true,
            ],
            'arguments' => [],
        ];
    }
}
