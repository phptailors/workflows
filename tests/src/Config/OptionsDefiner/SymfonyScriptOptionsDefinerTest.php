<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config\OptionsDefiner;

use PHPUnit\Framework\Attributes\CoversClass;

/**
 * @internal
 */
#[CoversClass(SymfonyScriptOptionsDefiner::class)]
#[CoversClass(SymfonyScriptOptionsDefinerTest::class)]
#[CoversClass(AbstractOptionsDefinerTestCase::class)]
final class SymfonyScriptOptionsDefinerTest extends AbstractOptionsDefinerTestCase
{
    use SymfonyScriptOptionsProvidersTrait;

    /**
     * @psalm-return iterable<array{inputs: array, expect: array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidOptions(): iterable
    {
        yield from self::provideValidSymfonyScriptOptions();
    }

    /**
     * @psalm-return iterable<array{inputs:array, expect: string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidOptions(): iterable
    {
        yield from self::provideInvalidSymfonyScriptOptions();
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
