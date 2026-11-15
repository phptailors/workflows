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
#[CoversClass(BackwardCompatibilityCheckOptionsDefiner::class)]
#[CoversClass(BackwardCompatibilityCheckOptionsDefinerTest::class)]
#[CoversClass(AbstractOptionsDefinerTestCase::class)]
final class BackwardCompatibilityCheckOptionsDefinerTest extends AbstractOptionsDefinerTestCase
{
    use BackwardCompatibilityCheckOptionsProvidersTrait;

    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidOptions(): iterable
    {
        yield from self::provideValidBackwardCompatibilityCheckOptions();
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidOptions(): iterable
    {
        yield from self::provideInvalidBackwardCompatibilityCheckOptions();
    }

    /**
     * @psalm-return array
     */
    protected static function optionsDefaults(): array
    {
        return [];
    }

    protected static function getOptionsDefiner(): OptionsDefinerInterface
    {
        return new BackwardCompatibilityCheckOptionsDefiner();
    }
}
