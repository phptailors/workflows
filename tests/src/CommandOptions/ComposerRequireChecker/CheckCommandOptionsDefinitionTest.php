<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions\ComposerRequireChecker;

use PHPUnit\Framework\Attributes\CoversClass;
use Tailors\Console\Workflows\CommandOptions\AbstractCommandOptionsTestCase;
use Tailors\Console\Workflows\CommandOptions\CommandOptionsDefinitionInterface;

use function Tailors\Console\Workflows\providerCaseKey as pck;

/**
 * @internal
 */
#[CoversClass(CheckCommandOptionsDefinition::class)]
#[CoversClass(CheckCommandOptionsDefinitionTest::class)]
#[CoversClass(AbstractCommandOptionsTestCase::class)]
final class CheckCommandOptionsDefinitionTest extends AbstractCommandOptionsTestCase
{
    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidCommandOptions(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['ignore_parse_errors' => null]],
            'expect' => ['ignore_parse_errors' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['ignore_parse_errors' => false]],
            'expect' => ['ignore_parse_errors' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['ignore_parse_errors' => true]],
            'expect' => ['ignore_parse_errors' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['output' => 'text']],
            'expect' => ['output' => 'text'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['output' => 'json']],
            'expect' => ['output' => 'json'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['config_file' => 'composer-require-checker.json']],
            'expect' => ['config_file' => 'composer-require-checker.json'],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidCommandOptions(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['inexistent_option' => null]],
            'expect' => '/Unrecognized option "inexistent_option" under "options"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['ignore_parse_errors' => 'FOO']],
            'expect' => '/Invalid type for path "options\.ignore_parse_errors"\. Expected "bool", but got "string"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['output' => 123]],
            'expect' => '/The value 123 is not allowed for path "options\.output"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['output' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "options\.output"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['config_file' => 123]],
            'expect' => '/Invalid type for path "options\.config_file"\. Expected "string", but got "int"/',
        ];
    }

    /**
     * @psalm-return array<string,mixed>
     */
    protected static function getCommandOptionsDefaults(): array
    {
        return [];
    }

    protected static function getCommandOptionsDefinition(): CommandOptionsDefinitionInterface
    {
        return new CheckCommandOptionsDefinition();
    }
}
