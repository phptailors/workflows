<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config;

use function Tailors\Console\Workflows\providerCaseKey as pck;

/**
 * @internal
 */
trait ProvideCommonSettingsTrait
{
    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideValidCommonSettings(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'inputs' => [[]],
            'expect' => [],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['script' => 'FOO']],
            'expect' => ['script' => 'FOO'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['script' => 'FOO'], ['script' => 'BAR']],
            'expect' => ['script' => 'BAR'],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideInvalidCommonSettings(string $pathBase): iterable
    {
        $pathBase = preg_quote($pathBase, '/');

        yield pck(__FILE__, __LINE__, $pathBase) => [
            'inputs' => [['script' => null]],
            'expect' => '/"'.$pathBase.'\.script" cannot contain an empty value/',
        ];

        yield pck(__FILE__, __LINE__, $pathBase) => [
            'inputs' => [['command' => null]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "'.$pathBase.'\.command"/',
        ];

        yield pck(__FILE__, __LINE__, $pathBase) => [
            'inputs' => [['command' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "'.$pathBase.'\.command"/',
        ];

        yield pck(__FILE__, __LINE__, $pathBase) => [
            'inputs' => [['options' => ['inexistent_option' => null]]],
            'expect' => '/Unrecognized option "inexistent_option" under "'.$pathBase.'\.options"\./',
        ];
    }
}
