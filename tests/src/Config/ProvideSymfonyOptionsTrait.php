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
trait ProvideSymfonyOptionsTrait
{
    /**
     * @return iterable<string, array{inputs:array, expect:array}>
     */
    public static function provideValidSymfonyOptions(string $rootName): iterable
    {
        yield pck(__FILE__, __LINE__, $rootName) => [
            'inputs' => [['options' => [$rootName => ['no_interactions' => null]]]],
            'expect' => ['options' => [$rootName => ['no_interactions' => true]]],
        ];

        yield pck(__FILE__, __LINE__, $rootName) => [
            'inputs' => [['options' => [$rootName => ['no_interactions' => true]]]],
            'expect' => ['options' => [$rootName => ['no_interactions' => true]]],
        ];

        yield pck(__FILE__, __LINE__, $rootName) => [
            'inputs' => [['options' => [$rootName => ['no_interactions' => false]]]],
            'expect' => ['options' => [$rootName => ['no_interactions' => false]]],
        ];

        yield pck(__FILE__, __LINE__, $rootName) => [
            'inputs' => [['options' => [$rootName => ['ansi' => null]]]],
            'expect' => ['options' => [$rootName => ['ansi' => true]]],
        ];

        yield pck(__FILE__, __LINE__, $rootName) => [
            'inputs' => [['options' => [$rootName => ['ansi' => true]]]],
            'expect' => ['options' => [$rootName => ['ansi' => true]]],
        ];

        yield pck(__FILE__, __LINE__, $rootName) => [
            'inputs' => [['options' => [$rootName => ['ansi' => false]]]],
            'expect' => ['options' => [$rootName => ['ansi' => false]]],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    public static function provideInvalidSymfonyOptions(string $pathBase, string $rootName): iterable
    {
        $pathBase = preg_quote($pathBase, '/');

        yield pck(__FILE__, __LINE__, $pathBase, $rootName) => [
            'inputs' => [['options' => [$rootName => ['no_interactions' => 'FOO']]]],
            'expect' => '/Invalid type for path "'.$pathBase.'\.options\.'.$rootName.'\.no_interactions"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__, $pathBase, $rootName) => [
            'inputs' => [['options' => [$rootName => ['ansi' => 'FOO']]]],
            'expect' => '/Invalid type for path "'.$pathBase.'\.options\.'.$rootName.'\.ansi"\. Expected "bool", but got "string"\./',
        ];
    }
}
