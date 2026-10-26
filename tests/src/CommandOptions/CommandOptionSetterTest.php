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
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

use function Tailors\Console\Workflows\providerCaseKey as pck;

/**
 * @internal
 */
#[CoversClass(CommandOptionSetter::class)]
#[CoversClass(CommandOptionSetterTest::class)]
final class CommandOptionSetterTest extends TestCase
{
    /**
     * @psalm-return iterable<string, array{
     *      expect: mixed,
     *      options: list<string>,
     *      name: string,
     *      value: bool,
     *      opposite?: ?string
     * }>
     */
    public static function provideSetBooleanFlag(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'expect' => ['--quiet'],
            'options' => [],
            'name' => '--quiet',
            'value' => true,
        ];


        yield pck(__FILE__, __LINE__) => [
            'expect' => ['--foo=12', '--bar', '--quiet'],
            'options' => ['--foo=12', '--bar'],
            'name' => '--quiet',
            'value' => true,
        ];
    }

    /**
     * @param list<string> $options
     * @param SetBooleanFlagArgs $args
     */
    #[DataProvider('provideSetBooleanFlag')]
    public function testSetBooleanFlag(mixed $expect, array $options, string $name, bool $value, ?string $opposite = null): void
    {
        if (func_num_args() > 4) {
            CommandOptionSetter::setBooleanFlag($options, $name, $value, $opposite);
        } else {
            CommandOptionSetter::setBooleanFlag($options, $name, $value);
        }

        self::assertSame($expect, $options);
    }
}
