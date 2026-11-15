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
#[CoversClass(ComposerRequireCheckerOptionsDefiner::class)]
#[CoversClass(ComposerRequireCheckerOptionsDefinerTest::class)]
#[CoversClass(AbstractOptionsDefinerTestCase::class)]
final class ComposerRequireCheckerOptionsDefinerTest extends AbstractOptionsDefinerTestCase
{
    use ComposerRequireCheckerOptionsProvidersTrait;

    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidOptions(): iterable
    {
        yield from self::provideValidComposerRequireCheckerOptions();
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidOptions(): iterable
    {
        yield from self::provideInvalidComposerRequireCheckerOptions();
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
        return new ComposerRequireCheckerOptionsDefiner();
    }
}
