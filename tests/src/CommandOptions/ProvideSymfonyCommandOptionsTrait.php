<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions;

use function Tailors\Console\Workflows\providerCaseKey as pck;

/**
 * @internal
 */
trait ProvideSymfonyCommandOptionsTrait
{
    /**
     * @return iterable<string, array{inputs:array, expect:array}>
     */
    public static function provideValidSymfonyCommandOptions(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['no_interactions' => null]],
            'expect' => ['no_interactions' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['no_interactions' => true]],
            'expect' => ['no_interactions' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['no_interactions' => false]],
            'expect' => ['no_interactions' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['ansi' => null]],
            'expect' => ['ansi' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['ansi' => true]],
            'expect' => ['ansi' => true]
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['ansi' => false]],
            'expect' => ['ansi' => false],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    public static function provideInvalidSymfonyCommandOptions(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['no_interactions' => 'FOO']],
            'expect' => '/Invalid type for path "options\.no_interactions"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['ansi' => 'FOO']],
            'expect' => '/Invalid type for path "options\.ansi"\. Expected "bool", but got "string"\./',
        ];
    }
}
