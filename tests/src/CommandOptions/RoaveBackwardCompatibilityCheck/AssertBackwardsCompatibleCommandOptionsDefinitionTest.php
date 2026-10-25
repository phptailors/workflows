<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions\RoaveBackwardCompatibilityCheck;

use PHPUnit\Framework\Attributes\CoversClass;
use Tailors\Console\Workflows\CommandOptions\AbstractCommandOptionsTestCase;
use Tailors\Console\Workflows\CommandOptions\CommandOptionsDefinitionInterface;

use function Tailors\Console\Workflows\providerCaseKey as pck;

/**
 * @internal
 */
#[CoversClass(AssertBackwardsCompatibleCommandOptionsDefinition::class)]
#[CoversClass(AssertBackwardsCompatibleCommandOptionsDefinitionTest::class)]
#[CoversClass(AbstractCommandOptionsTestCase::class)]
final class AssertBackwardsCompatibleCommandOptionsDefinitionTest extends AbstractCommandOptionsTestCase
{
    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidCommandOptions(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['from' => null]],
            'expect' => ['from' => ''],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['from' => 'FOO']],
            'expect' => ['from' => 'FOO'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['to' => null]],
            'expect' => ['to' => ''],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['to' => 'FOO']],
            'expect' => ['to' => 'FOO'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['install_development_dependencies' => null]],
            'expect' => ['install_development_dependencies' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['install_development_dependencies' => true]],
            'expect' => ['install_development_dependencies' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['install_development_dependencies' => false]],
            'expect' => ['install_development_dependencies' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['format' => 'console']],
            'expect' => ['format' => 'console'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['format' => 'markdown']],
            'expect' => ['format' => 'markdown'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['format' => 'github-actions']],
            'expect' => ['format' => 'github-actions'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['format' => 'github-actions']],
            'expect' => ['format' => 'github-actions'],
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
            'inputs' => [['from' => 123]],
            'expect' => '/Invalid type for path "options\.from"\. Expected "string", but got "int"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['to' => 123]],
            'expect' => '/Invalid type for path "options\.to"\. Expected "string", but got "int"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['install_development_dependencies' => 123]],
            'expect' => '/Invalid type for path "options\.install_development_dependencies"\. Expected "bool", but got "int"/',
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['format' => 123]],
            'expect' => '/The value 123 is not allowed for path "options\.format"/',
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
        return new AssertBackwardsCompatibleCommandOptionsDefinition();
    }
}
