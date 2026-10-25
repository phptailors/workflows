<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions\PhpCsFixer;

use function Tailors\Console\Workflows\providerCaseKey as pck;

/**
 * @internal
 */
trait ProvideCheckCommandOptionsTrait
{
    /**
     * @return iterable<string, array{inputs:array, expect:array}>
     */
    public static function provideValidPhpCsFixerCheckCommandOptions(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['path_mode' => 'override']],
            'expect' => ['path_mode' => 'override'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['path_mode' => 'intersection']],
            'expect' => ['path_mode' => 'intersection'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['allow_risky' => null]],
            'expect' => ['allow_risky' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['allow_risky' => false]],
            'expect' => ['allow_risky' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['allow_risky' => true]],
            'expect' => ['allow_risky' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['config' => 'php-cs-fixer.json']],
            'expect' => ['config' => 'php-cs-fixer.json'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['rules' => []]],
            'expect' => [],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['rules' => []]],
            'expect' => ['rules' => []],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['rules' => null]],
            'expect' => ['rules' => []],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['rules' => ['@Symfony', '-@PSR1', '-blank_line_before_statement']]],
            'expect' => ['rules' => ['@Symfony', '-@PSR1', '-blank_line_before_statement']],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['using_cache' => null]],
            'expect' => ['using_cache' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['using_cache' => false]],
            'expect' => ['using_cache' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['using_cache' => true]],
            'expect' => ['using_cache' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['allow_unsupported_php_version' => null]],
            'expect' => ['allow_unsupported_php_version' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['allow_unsupported_php_version' => false]],
            'expect' => ['allow_unsupported_php_version' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['allow_unsupported_php_version' => true]],
            'expect' => ['allow_unsupported_php_version' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['cache_file' => '.php-cs-fixer.cache']],
            'expect' => ['cache_file' => '.php-cs-fixer.cache'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['cache_file' => null]],
            'expect' => ['cache_file' => ''],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['diff' => null]],
            'expect' => ['diff' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['diff' => false]],
            'expect' => ['diff' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['diff' => true]],
            'expect' => ['diff' => true],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => '@auto']],
            'expect' => ['format' => '@auto'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => '@auto,checkstyle']],
            'expect' => ['format' => '@auto,checkstyle'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => '@auto,gitlab']],
            'expect' => ['format' => '@auto,gitlab'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => '@auto,json']],
            'expect' => ['format' => '@auto,json'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => '@auto,junit']],
            'expect' => ['format' => '@auto,junit'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => '@auto,txt']],
            'expect' => ['format' => '@auto,txt'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => '@auto,xml']],
            'expect' => ['format' => '@auto,xml'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => 'checkstyle']],
            'expect' => ['format' => 'checkstyle'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => 'gitlab']],
            'expect' => ['format' => 'gitlab'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => 'json']],
            'expect' => ['format' => 'json'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => 'junit']],
            'expect' => ['format' => 'junit'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => 'txt']],
            'expect' => ['format' => 'txt'],
        ];

        yield basename('__FILE__').':'.__LINE__ => [
            'inputs' => [['format' => 'xml']],
            'expect' => ['format' => 'xml'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['stop_on_violation' => null]],
            'expect' => ['stop_on_violation' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['stop_on_violation' => false]],
            'expect' => ['stop_on_violation' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['stop_on_violation' => true]],
            'expect' => ['stop_on_violation' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['show_progress' => 'bar']],
            'expect' => ['show_progress' => 'bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['show_progress' => 'dots']],
            'expect' => ['show_progress' => 'dots'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['show_progress' => 'none']],
            'expect' => ['show_progress' => 'none'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['sequential' => null]],
            'expect' => ['sequential' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['sequential' => false]],
            'expect' => ['sequential' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['sequential' => true]],
            'expect' => ['sequential' => true],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    public static function provideInvalidPhpCsFixerCheckCommandOptions(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['inexistent_option' => null]],
            'expect' => '/Unrecognized option "inexistent_option" under "options"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['path_mode' => null]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "options\.path_mode"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['path_mode' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "options\.path_mode"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['allow_risky' => 'FOO']],
            'expect' => '/Invalid type for path "options\.allow_risky"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['config' => 123]],
            'expect' => '/Invalid type for path "options\.config"\. Expected "string", but got "int"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['rules' => 123]],
            'expect' => '/Invalid type for path "options\.rules"\. Expected "array", but got "int"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['rules' => ['@Symfony', 123]]],
            'expect' => '/Invalid type for path "options\.rules\.1"\. Expected "string", but got "int"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['using_cache' => 'FOO']],
            'expect' => '/Invalid type for path "options\.using_cache"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['allow_unsupported_php_version' => 'FOO']],
            'expect' => '/Invalid type for path "options\.allow_unsupported_php_version"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['cache_file' => 123]],
            'expect' => '/Invalid type for path "options\.cache_file"\. Expected "string", but got "int"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['diff' => 'FOO']],
            'expect' => '/Invalid type for path "options\.diff"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['format' => null]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "options\.format"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['format' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "options\.format"\. Permissible values:.*"@auto".*/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['stop_on_violation' => 'FOO']],
            'expect' => '/Invalid type for path "options\.stop_on_violation"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['show_progress' => null]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "options\.show_progress"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['show_progress' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "options\.show_progress"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['sequential' => 'FOO']],
            'expect' => '/Invalid type for path "options\.sequential"\. Expected "bool", but got "string"/',
        ];
    }
}
