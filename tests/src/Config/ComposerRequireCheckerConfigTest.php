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
            'inputs' => [['command' => 'check']],
            'expect' => ['command' => 'check'],
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
            'inputs' => [['options' => ['ansi' => false]]],
            'expect' => ['options' => ['ansi' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => true]]],
            'expect' => ['options' => ['ansi' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['silent' => null]]],
            'expect' => ['options' => ['silent' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['silent' => false]]],
            'expect' => ['options' => ['silent' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['silent' => true]]],
            'expect' => ['options' => ['silent' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['quiet' => null]]],
            'expect' => ['options' => ['quiet' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['quiet' => false]]],
            'expect' => ['options' => ['quiet' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['quiet' => true]]],
            'expect' => ['options' => ['quiet' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['output' => 'text']]],
            'expect' => ['options' => ['output' => 'text']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['output' => 'json']]],
            'expect' => ['options' => ['output' => 'json']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['config_file' => 'composer-require-checker.json']]],
            'expect' => ['options' => ['config_file' => 'composer-require-checker.json']],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    public static function provideWithInvalidConfig(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => null]],
            'expect' => '/"composer_require_checker\.script" cannot contain an empty value/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => null]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "composer_require_checker\.command"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "composer_require_checker\.command"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['inexistent_option' => null]]],
            'expect' => '/Unrecognized option "inexistent_option" under "composer_require_checker\.options"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => 'FOO']]],
            'expect' => '/Invalid type for path "composer_require_checker\.options\.no_interactions"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => 'FOO']]],
            'expect' => '/Invalid type for path "composer_require_checker\.options\.ansi"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['silent' => 'FOO']]],
            'expect' => '/Invalid type for path "composer_require_checker\.options\.silent"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['quiet' => 'FOO']]],
            'expect' => '/Invalid type for path "composer_require_checker\.options\.quiet"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ignore_parse_errors' => 'FOO']]],
            'expect' => '/Invalid type for path "composer_require_checker\.options\.ignore_parse_errors"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['output' => 123]]],
            'expect' => '/The value 123 is not allowed for path "composer_require_checker\.options\.output"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['output' => 'FOO']]],
            'expect' => '/The value "FOO" is not allowed for path "composer_require_checker\.options\.output"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['config_file' => 123]]],
            'expect' => '/Invalid type for path "composer_require_checker\.options\.config_file"\. Expected "string", but got "int"\./',
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
            'script'    => 'composer-require-checker',
            'options'   => [
                'no_interactions' => true,
                'ansi'            => true,
            ],
            'arguments' => [],
        ];
    }
}
