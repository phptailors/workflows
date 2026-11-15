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
trait BackwardCompatibilityCheckOptionsProvidersTrait
{
    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideValidBackwardCompatibilityCheckOptions(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['from' => null]],
            'expect' => ['from' => ''],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['from' => 'FOO']],
            'expect' => ['from' => 'FOO'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['to' => null]],
            'expect' => ['to' => ''],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['to' => 'FOO']],
            'expect' => ['to' => 'FOO'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['install_development_dependencies' => null]],
            'expect' => ['install_development_dependencies' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['install_development_dependencies' => true]],
            'expect' => ['install_development_dependencies' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['install_development_dependencies' => false]],
            'expect' => ['install_development_dependencies' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['format' => 'console']],
            'expect' => ['format' => 'console'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['format' => 'markdown']],
            'expect' => ['format' => 'markdown'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['format' => 'github-actions']],
            'expect' => ['format' => 'github-actions'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['format' => 'github-actions']],
            'expect' => ['format' => 'github-actions'],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideInvalidBackwardCompatibilityCheckOptions(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['from' => 123]],
            'expect' => '/Invalid type for path "options\.from"\. Expected "string", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['to' => 123]],
            'expect' => '/Invalid type for path "options\.to"\. Expected "string", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['install_development_dependencies' => 123]],
            'expect' => '/Invalid type for path "options\.install_development_dependencies"\. Expected "bool", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['format' => 123]],
            'expect' => '/The value 123 is not allowed for path "options\.format"/',
        ];
    }
}
