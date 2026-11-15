<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config\OptionsDefiner;


/**
 * @internal
 */
trait ComposerRequireCheckerOptionsProvidersTrait
{
    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideValidComposerRequireCheckerOptions(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [[]],
            'expect' => [],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['ignore_parse_errors' => false]],
            'expect' => ['ignore_parse_errors' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['ignore_parse_errors' => true]],
            'expect' => ['ignore_parse_errors' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['output' => 'text']],
            'expect' => ['output' => 'text'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['output' => 'json']],
            'expect' => ['output' => 'json'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['config_file' => 'composer-require-checker.json']],
            'expect' => ['config_file' => 'composer-require-checker.json'],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideInvalidComposerRequireCheckerOptions(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['ignore_parse_errors' => 'FOO']],
            'expect' => '/Invalid type for path "options\.ignore_parse_errors"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['output' => 123]],
            'expect' => '/The value 123 is not allowed for path "options\.output"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['output' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "options\.output"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['config_file' => 123]],
            'expect' => '/Invalid type for path "options\.config_file"\. Expected "string", but got "int"\./',
        ];
    }
}
