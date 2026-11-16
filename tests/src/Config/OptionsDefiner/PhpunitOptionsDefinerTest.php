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
#[CoversClass(PhpunitOptionsDefiner::class)]
#[CoversClass(PhpunitOptionsDefinerTest::class)]
#[CoversClass(AbstractOptionsDefinerTestCase::class)]
final class PhpunitOptionsDefinerTest extends AbstractOptionsDefinerTestCase
{
    use PhpunitOptionsProvidersTrait;

    /**
     * @psalm-return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidOptions(): iterable
    {
        yield from self::provideValidPhpunitOptions();
    }

    /**
     * @psalm-return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidOptions(): iterable
    {
        yield from self::provideInvalidPhpunitOptions();
    }

    /**
     * @return array
     */
    protected static function optionsDefaults(): array
    {
        return [
            'coverage_filter' => null,
            'd' => null,
            'exclude_group' => null,
            'exclude_testsuite' => null,
            'extensions' => null,
            'group' => null,
            'include_path' => null,
            'order_by' => null,
            'test_suffix' => null,
            'testdox_exclude_group' => null,
            'testdox_group' => null,
            'testsuite' => null,
        ];
    }

    protected static function getOptionsDefiner(): OptionsDefinerInterface
    {
        return new PhpunitOptionsDefiner();
    }
}
