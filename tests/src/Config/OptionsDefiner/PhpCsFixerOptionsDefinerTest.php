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
#[CoversClass(PhpCsFixerOptionsDefiner::class)]
#[CoversClass(PhpCsFixerOptionsDefinerTest::class)]
#[CoversClass(AbstractOptionsDefinerTestCase::class)]
final class PhpCsFixerOptionsDefinerTest extends AbstractOptionsDefinerTestCase
{
    use PhpCsFixerOptionsProvidersTrait;

    /**
     * @psalm-return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidOptions(): iterable
    {
        yield from self::provideValidPhpCsFixerOptions();
    }

    /**
     * @psalm-return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidOptions(): iterable
    {
        yield from self::provideInvalidPhpCsFixerOptions();
    }

    /**
     * @return array
     */
    protected static function optionsDefaults(): array
    {
        return ['rules' => []];
    }

    protected static function getOptionsDefiner(): OptionsDefinerInterface
    {
        return new PhpCsFixerOptionsDefiner();
    }
}
