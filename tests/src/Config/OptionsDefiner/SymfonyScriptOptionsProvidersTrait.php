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
trait SymfonyScriptOptionsProvidersTrait
{
    /**
     * @psalm-return iterable<array{inputs: array, expect: array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideValidSymfonyScriptOptions(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [[]],
            'expect' => [],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_interactions' => null]],
            'expect' => ['no_interactions' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_interactions' => true]],
            'expect' => ['no_interactions' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_interactions' => false]],
            'expect' => ['no_interactions' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['ansi' => null]],
            'expect' => ['ansi' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['ansi' => false]],
            'expect' => ['ansi' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['ansi' => true]],
            'expect' => ['ansi' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['silent' => null]],
            'expect' => ['silent' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['silent' => false]],
            'expect' => ['silent' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['silent' => true]],
            'expect' => ['silent' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['quiet' => null]],
            'expect' => ['quiet' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['quiet' => false]],
            'expect' => ['quiet' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['quiet' => true]],
            'expect' => ['quiet' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['verbose' => 0]],
            'expect' => ['verbose' => 0],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['verbose' => 1]],
            'expect' => ['verbose' => 1],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['verbose' => 2]],
            'expect' => ['verbose' => 2],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['verbose' => 3]],
            'expect' => ['verbose' => 3],
        ];
    }

    /**
     * @psalm-return iterable<array{inputs:array, expect: string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideInvalidSymfonyScriptOptions(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['inexistent_option' => null]],
            'expect' => '/Unrecognized option "inexistent_option" under "options"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_interactions' => 'FOO']],
            'expect' => '/Invalid type for path "options\.no_interactions"\. Expected "bool", but got "string"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['ansi' => 'FOO']],
            'expect' => '/Invalid type for path "options\.ansi"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['silent' => 'FOO']],
            'expect' => '/Invalid type for path "options\.silent"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['quiet' => 'FOO']],
            'expect' => '/Invalid type for path "options\.quiet"\. Expected "bool", but got "string"\./',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['verbose' => 4]],
            'expect' => '/The value 4 is too big for path "options\.verbose"\. Should be less than or equal to 3/',
        ];
    }

    /**
     * @psalm-return array
     */
    protected static function optionsDefaults(): array
    {
        return [
            'no_interactions' => true,
            'ansi'            => true,
        ];
    }

    protected static function getOptionsDefiner(): OptionsDefinerInterface
    {
        return new SymfonyScriptOptionsDefiner();
    }
}
