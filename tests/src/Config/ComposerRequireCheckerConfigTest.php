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
#[CoversClass(ComposerRequireCheckerConfig::class)]
#[CoversClass(ComposerRequireCheckerConfigTest::class)]
final class ComposerRequireCheckerConfigTest extends TestCase
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
        $config = new ComposerRequireCheckerConfig();
        $processedConfig = $processor->processConfiguration($config, $inputs);
        $this->assertRecursivelyKsortedArrayIdenticalTo($expect, $processedConfig);
    }

    /**
     * @param array $inputs
     */
    #[DataProvider('provideWithInvalidConfig')]
    public function testWithInvalidConfig(array $inputs, string $expect): void
    {
        $processor = new Processor();
        $config = new ComposerRequireCheckerConfig();

        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessageMatches($expect);

        $processedConfig = $processor->processConfiguration($config, $inputs);
    }

    /**
     * @return iterable<array{inputs:array, expect:array}>
     */
    public static function provideWithValidConfig(): iterable
    {
        $defaults = [
            'script'    => 'composer-require-checker',
            'options'   => [
                'no_interactions' => true,
                'ansi'            => true,
            ],
            'arguments' => [],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [[]],
            'expect' => $defaults,
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => 'FOO']],
            'expect' => \array_merge($defaults, ['script' => 'FOO']),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => 'FOO'], ['script' => 'BAR']],
            'expect' => \array_merge($defaults, ['script' => 'BAR']),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'check']],
            'expect' => \array_merge($defaults, ['command' => 'check']),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => []]],
            'expect' => $defaults,
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => null]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['no_interactions' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => true]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['no_interactions' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => false]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['no_interactions' => false]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => null]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['ansi' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => false]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['ansi' => false]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => true]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['ansi' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['silent' => null]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['silent' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['silent' => false]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['silent' => false]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['silent' => true]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['silent' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['quiet' => null]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['quiet' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['quiet' => false]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['quiet' => false]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['quiet' => true]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['quiet' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['output' => 'text']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['output' => 'text']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['output' => 'json']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['output' => 'json']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['config_file' => 'composer-require-checker.json']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['config_file' => 'composer-require-checker.json']]),
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
            'inputs' => [['options' => ['silent' => 'FOO']]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.silent"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['quiet' => 'FOO']]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.quiet"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ignore_parse_errors' => 'FOO']]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.ignore_parse_errors"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['output' => 123]]],
            'expect' => '/The value 123 is not allowed for path "backward_compatibility_check\.options\.output"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['output' => 'FOO']]],
            'expect' => '/The value "FOO" is not allowed for path "backward_compatibility_check\.options\.output"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['config_file' => 123]]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.config_file"\. Expected "string", but got "int"\./',
        ];
    }
}
