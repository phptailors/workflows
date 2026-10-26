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
        //
        // no_interactions
        //
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

        //
        // ansi
        //

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

        //
        // quiet
        //

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['quiet' => null]],
            'expect' => ['quiet' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['quiet' => true]],
            'expect' => ['quiet' => true]
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['quiet' => false]],
            'expect' => ['quiet' => false],
        ];

        //
        // silent
        //

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['silent' => null]],
            'expect' => ['silent' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['silent' => true]],
            'expect' => ['silent' => true]
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['silent' => false]],
            'expect' => ['silent' => false],
        ];

        //
        // verbose
        //

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['verbose' => true]],
            'expect' => ['verbose' => true]
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['verbose' => false]],
            'expect' => ['verbose' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['verbose' => 0]],
            'expect' => ['verbose' => 0],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['verbose' => 1]],
            'expect' => ['verbose' => 1],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['verbose' => 2]],
            'expect' => ['verbose' => 2],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['verbose' => 3]],
            'expect' => ['verbose' => 3],
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
            'expect' => '/Invalid type for path "options\.ansi"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['quiet' => 'FOO']],
            'expect' => '/Invalid type for path "options\.quiet"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['silent' => 'FOO']],
            'expect' => '/Invalid type for path "options\.silent"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['verbose' => null]],
            'expect' => '/The value (of type "null"|null) is not allowed for path "options\.verbose"\. Permissible values: false, true, 0, 1, 2, 3\./',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['verbose' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "options\.verbose"\. Permissible values: false, true, 0, 1, 2, 3\./',
        ];
    }
}
