<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions\PhpCsFixer;

use PHPUnit\Framework\Attributes\CoversClass;
use Tailors\Console\Workflows\CommandOptions\AbstractCommandOptionsTestCase;
use Tailors\Console\Workflows\CommandOptions\CommandOptionsDefinitionInterface;

use function Tailors\Console\Workflows\providerCaseKey as pck;

/**
 * @internal
 */
#[CoversClass(FixCommandOptionsDefinition::class)]
#[CoversClass(FixCommandOptionsDefinitionTest::class)]
#[CoversClass(AbstractCommandOptionsTestCase::class)]
final class FixCommandOptionsDefinitionTest extends AbstractCommandOptionsTestCase
{
    use ProvideCheckCommandOptionsTrait;

    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidCommandOptions(): iterable
    {
        yield from self::provideValidPhpCsFixerCheckCommandOptions();

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['dry_run' => null]],
            'expect' => ['dry_run' => true],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['dry_run' => false]],
            'expect' => ['dry_run' => false],
        ];

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['dry_run' => true]],
            'expect' => ['dry_run' => true],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidCommandOptions(): iterable
    {
        yield from self::provideInvalidPhpCsFixerCheckCommandOptions();

        yield pck(__FILE__, __LINE__) => [
            'inputs' => [['dry_run' => 'FOO']],
            'expect' => '/Invalid type for path "options\.dry_run"\. Expected "bool", but got "string"/',
        ];
    }

    /**
     * @psalm-return array<string,mixed>
     */
    protected static function getCommandOptionsDefaults(): array
    {
        return ['rules' => []];
    }

    protected static function getCommandOptionsDefinition(): CommandOptionsDefinitionInterface
    {
        return new FixCommandOptionsDefinition(new CheckCommandOptionsDefinition());
    }
}
