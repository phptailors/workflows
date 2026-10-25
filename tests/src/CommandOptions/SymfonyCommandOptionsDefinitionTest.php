<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions;

use PHPUnit\Framework\Attributes\CoversClass;
use Tailors\Console\Workflows\CommandOptions\AbstractCommandOptionsTestCase;
use Tailors\Console\Workflows\CommandOptions\CommandOptionsDefinitionInterface;


/**
 * @internal
 */
#[CoversClass(SymfonyCommandOptionsDefinition::class)]
#[CoversClass(SymfonyCommandOptionsDefinitionTest::class)]
#[CoversClass(AbstractCommandOptionsTestCase::class)]
final class SymfonyCommandOptionsDefinitionTest extends AbstractCommandOptionsTestCase
{
    use ProvideSymfonyCommandOptionsTrait;

    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidCommandOptions(): iterable
    {
        yield from self::provideValidSymfonyCommandOptions();
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidCommandOptions(): iterable
    {
        yield from self::provideInvalidSymfonyCommandOptions();
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
        return new SymfonyCommandOptionsDefinition();
    }
}
