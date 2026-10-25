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
#[CoversClass(PhpCsFixerConfig::class)]
#[CoversClass(PhpCsFixerConfigTest::class)]
final class PhpCsFixerConfigTest extends TestCase
{
    use RecursivelyKsortedArrayIdenticalToTrait;

    /**
     * @psalm-param array $inputs
     * @psalm-param array $expect
     */
    #[DataProvider('provideWithValidConfig')]
    public function testWithValidConfig(array $inputs, array $expect): void
    {
        $processor = new Processor();
        $config = new PhpCsFixerConfig();

        try {
            $processedConfig = $processor->processConfiguration($config, $inputs);
        } catch (InvalidConfigurationException $exception) {
            $this->fail("Invalid configuration. ".$exception->getMessage());
        }

        $expect = \array_replace_recursive(self::configDefaults(), $expect);
        $this->assertRecursivelyKsortedArrayIdenticalTo($expect, $processedConfig);
    }

    /**
     * @psalm-param array $inputs
     */
    #[DataProvider('provideWithInvalidConfig')]
    public function testWithInvalidConfig(array $inputs, string $expect): void
    {
        $processor = new Processor();
        $config = new PhpCsFixerConfig();

        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessageMatches($expect);

        $processedConfig = $processor->processConfiguration($config, $inputs);
    }

    /**
     * @psalm-return iterable<array{inputs:array, expect:array}>
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
            'inputs' => [['options' => ['path_mode' => 'override']]],
            'expect' => ['options' => ['path_mode' => 'override']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['path_mode' => 'intersection']]],
            'expect' => ['options' => ['path_mode' => 'intersection']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['allow_risky' => null]]],
            'expect' => ['options' => ['allow_risky' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['allow_risky' => false]]],
            'expect' => ['options' => ['allow_risky' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['allow_risky' => true]]],
            'expect' => ['options' => ['allow_risky' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['config' => 'php-cs-fixer.json']]],
            'expect' => ['options' => ['config' => 'php-cs-fixer.json']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['rules' => []]]],
            'expect' => ['options' => []],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['rules' => []]]],
            'expect' => ['options' => ['rules' => []]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['rules' => null]]],
            'expect' => ['options' => ['rules' => []]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['rules' => ['@Symfony', '-@PSR1', '-blank_line_before_statement']]]],
            'expect' => ['options' => ['rules' => ['@Symfony', '-@PSR1', '-blank_line_before_statement']]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['using_cache' => null]]],
            'expect' => ['options' => ['using_cache' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['using_cache' => false]]],
            'expect' => ['options' => ['using_cache' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['using_cache' => true]]],
            'expect' => ['options' => ['using_cache' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['allow_unsupported_php_version' => null]]],
            'expect' => ['options' => ['allow_unsupported_php_version' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['allow_unsupported_php_version' => false]]],
            'expect' => ['options' => ['allow_unsupported_php_version' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['allow_unsupported_php_version' => true]]],
            'expect' => ['options' => ['allow_unsupported_php_version' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['cache_file' => '.php-cs-fixer.cache']]],
            'expect' => ['options' => ['cache_file' => '.php-cs-fixer.cache']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['cache_file' => null]]],
            'expect' => ['options' => ['cache_file' => '']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['diff' => null]]],
            'expect' => ['options' => ['diff' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['diff' => false]]],
            'expect' => ['options' => ['diff' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['diff' => true]]],
            'expect' => ['options' => ['diff' => true]],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => '@auto']]],
            'expect' => ['options' => ['format' => '@auto']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => '@auto,checkstyle']]],
            'expect' => ['options' => ['format' => '@auto,checkstyle']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => '@auto,gitlab']]],
            'expect' => ['options' => ['format' => '@auto,gitlab']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => '@auto,json']]],
            'expect' => ['options' => ['format' => '@auto,json']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => '@auto,junit']]],
            'expect' => ['options' => ['format' => '@auto,junit']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => '@auto,txt']]],
            'expect' => ['options' => ['format' => '@auto,txt']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => '@auto,xml']]],
            'expect' => ['options' => ['format' => '@auto,xml']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'checkstyle']]],
            'expect' => ['options' => ['format' => 'checkstyle']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'gitlab']]],
            'expect' => ['options' => ['format' => 'gitlab']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'json']]],
            'expect' => ['options' => ['format' => 'json']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'junit']]],
            'expect' => ['options' => ['format' => 'junit']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'txt']]],
            'expect' => ['options' => ['format' => 'txt']],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'xml']]],
            'expect' => ['options' => ['format' => 'xml']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['stop_on_violation' => null]]],
            'expect' => ['options' => ['stop_on_violation' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['stop_on_violation' => false]]],
            'expect' => ['options' => ['stop_on_violation' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['stop_on_violation' => true]]],
            'expect' => ['options' => ['stop_on_violation' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['show_progress' => 'bar']]],
            'expect' => ['options' => ['show_progress' => 'bar']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['show_progress' => 'dots']]],
            'expect' => ['options' => ['show_progress' => 'dots']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['show_progress' => 'none']]],
            'expect' => ['options' => ['show_progress' => 'none']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['sequential' => null]]],
            'expect' => ['options' => ['sequential' => true]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['sequential' => false]]],
            'expect' => ['options' => ['sequential' => false]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['sequential' => true]]],
            'expect' => ['options' => ['sequential' => true]],
        ];
    }

    /**
     * @psalm-return iterable<array{inputs:array, expect:string}>
     */
    public static function provideWithInvalidConfig(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => null]],
            'expect' => '/"php_cs_fixer\.script" cannot contain an empty value/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => null]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "php_cs_fixer\.command"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "php_cs_fixer\.command"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['inexistent_option' => null]]],
            'expect' => '/Unrecognized option "inexistent_option" under "php_cs_fixer\.options"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => 'FOO']]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.no_interactions"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => 'FOO']]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.ansi"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['path_mode' => null]]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "php_cs_fixer\.options\.path_mode"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['path_mode' => 'FOO']]],
            'expect' => '/The value "FOO" is not allowed for path "php_cs_fixer\.options\.path_mode"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['allow_risky' => 'FOO']]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.allow_risky"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['config' => 123]]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.config"\. Expected "string", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['rules' => 123]]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.rules"\. Expected "array", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['rules' => ['@Symfony', 123]]]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.rules\.1"\. Expected "string", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['using_cache' => 'FOO']]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.using_cache"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['allow_unsupported_php_version' => 'FOO']]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.allow_unsupported_php_version"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['cache_file' => 123]]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.cache_file"\. Expected "string", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['diff' => 'FOO']]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.diff"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => null]]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "php_cs_fixer\.options\.format"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'FOO']]],
            'expect' => '/The value "FOO" is not allowed for path "php_cs_fixer\.options\.format"\. Permissible values:.*"@auto".*/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['stop_on_violation' => 'FOO']]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.stop_on_violation"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['show_progress' => null]]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "php_cs_fixer\.options\.show_progress"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['show_progress' => 'FOO']]],
            'expect' => '/The value "FOO" is not allowed for path "php_cs_fixer\.options\.show_progress"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['sequential' => 'FOO']]],
            'expect' => '/Invalid type for path "php_cs_fixer\.options\.sequential"\. Expected "bool", but got "string"/',
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
                'rules'           => [],
            ],
            'arguments' => [],
        ];
    }
}
