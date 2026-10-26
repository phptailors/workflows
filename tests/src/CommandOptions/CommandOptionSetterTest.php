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
 *
 * @psalm-type SetBooleanFlagArgs = list{0: string, 1: ?bool, 2?: ?string}
 * @psalm-type SetLevelFlagArgs = list{0: array<int,string>, 1: bool|int|null, 2?: ?string, 3?: ?string}
 * @psalm-type SetStringValueArgs = list{0: string, 1: string}
 */
#[CoversClass(CommandOptionSetter::class)]
#[CoversClass(CommandOptionSetterTest::class)]
final class CommandOptionSetterTest extends TestCase
{
    /**
     * @psalm-return iterable<string, array{
     *      options: list<string>,
     *      args: SetBooleanFlagArgs,
     *      expect: mixed,
     * }>
     */
    public static function provideSetBooleanFlag(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'options' => [],
            'args'    => ['--quiet', true],
            'expect'  => ['--quiet'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--bar'],
            'args'    => ['--quiet', true],
            'expect'  => ['--foo=12', '--bar', '--quiet'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--quiet', '--bar'],
            'args'    => ['--quiet', true],
            'expect'  => ['--foo=12', '--quiet', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--quiet', '--bar'],
            'args'    => ['--quiet', false],
            'expect'  => ['--foo=12', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--quiet', '--bar'],
            'args'    => ['--quiet', null],
            'expect'  => ['--foo=12', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--quiet', '--bar', '--quiet', '--quiet'],
            'args'    => ['--quiet', false],
            'expect'  => ['--foo=12', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--quiet', '--bar', '--quiet', '--quiet'],
            'args'    => ['--quiet', null],
            'expect'  => ['--foo=12', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--quiet', '--bar', '--quiet', '--quiet'],
            'args'    => ['--quiet', true],
            'expect'  => ['--foo=12', '--quiet', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => [],
            'args'    => ['--ansi', true, '--no-ansi'],
            'expect'  => ['--ansi'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--bar'],
            'args'    => ['--ansi', true, '--no-ansi'],
            'expect'  => ['--foo=12', '--bar', '--ansi'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--ansi', '--bar'],
            'args'    => ['--ansi', true, '--no-ansi'],
            'expect'  => ['--foo=12', '--ansi', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--ansi', '--bar'],
            'args'    => ['--ansi', false, '--no-ansi'],
            'expect'  => ['--foo=12', '--no-ansi', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--ansi', '--bar', '--ansi', '--no-ansi'],
            'args'    => ['--ansi', false, '--no-ansi'],
            'expect'  => ['--foo=12', '--no-ansi', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--ansi', '--bar', '--no-ansi', '--ansi'],
            'args'    => ['--ansi', false, '--no-ansi'],
            'expect'  => ['--foo=12', '--no-ansi', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--ansi', '--bar', '--ansi', '--ansi'],
            'args'    => ['--ansi', true, '--no-ansi'],
            'expect'  => ['--foo=12', '--ansi', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo=12', '--ansi', '--bar', '--ansi', '--ansi'],
            'args'    => ['--ansi', null, '--no-ansi'],
            'expect'  => ['--foo=12', '--bar'],
        ];
    }

    /**
     * @param list<string>       $options
     * @param SetBooleanFlagArgs $args
     */
    #[DataProvider('provideSetBooleanFlag')]
    public function testSetBooleanFlag(array $options, array $args, mixed $expect): void
    {
        $setter = new CommandOptionSetter();

        self::assertSame($expect, $setter->setBooleanFlag($options, ...$args));
    }

    /**
     * @psalm-return iterable<string, array{
     *      options: list<string>,
     *      args: SetLevelFlagArgs,
     *      expect: mixed,
     * }>
     */
    public static function provideSetLevelFlag(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'options' => [],
            'args'    => [[], true],
            'expect'  => [],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => [],
            'args'    => [[], true, '--verbose'],
            'expect'  => ['--verbose'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--verbose'],
            'args'    => [[], false, '--verbose'],
            'expect'  => [],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--verbose'],
            'args'    => [[], null, '--verbose'],
            'expect'  => [],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '--verbose', '--baz', '--verbose'],
            'args'    => [[], true, '--verbose'],
            'expect'  => ['--foo', '--verbose', '--bar', '--baz'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '--verbose', '--baz', '--verbose'],
            'args'    => [[], false, '--verbose'],
            'expect'  => ['--foo', '--bar', '--baz'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '--verbose', '--baz', '--verbose'],
            'args'    => [[], null, '--verbose'],
            'expect'  => ['--foo', '--bar', '--baz'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '-v', '--bar', '--verbose', '--baz', '-vv', '--qux', '-vvv', '--cup', '-vvvv'],
            'args'    => [[1 => '-v', 2 => '-vv', 3 => '-vvv'], true, '--verbose'],
            'expect'  => ['--foo', '--verbose', '--bar', '--baz', '--qux', '--cup', '-vvvv'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '--verbose', '--baz', '--verbose'],
            'args'    => [[1 => '-v', 2 => '-vv', 3 => '-vvv'], false, '--verbose'],
            'expect'  => ['--foo', '--bar', '--baz'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '--verbose', '--baz', '--verbose'],
            'args'    => [[1 => '-v', 2 => '-vv', 3 => '-vvv'], null, '--verbose'],
            'expect'  => ['--foo', '--bar', '--baz'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '-v', '--baz', '-vv', '--qux', '-vvv'],
            'args'    => [[1 => '-v', 2 => '-vv', 3 => '-vvv'], 0, '--verbose'],
            'expect'  => ['--foo', '--verbose', '--bar', '-v', '--baz', '-vv', '--qux', '-vvv'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '-v', '--baz', '-vv', '--qux', '-vvv'],
            'args'    => [[1 => '-v', 2 => '-vv', 3 => '-vvv'], 1, '--verbose'],
            'expect'  => ['--foo', '-v', '--bar', '--baz', '--qux'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '-v', '--baz', '-vv', '--qux', '-vvv'],
            'args'    => [[1 => '-v', 2 => '-vv', 3 => '-vvv'], 2, '--verbose'],
            'expect'  => ['--foo', '-vv', '--bar', '--baz', '--qux'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--verbose', '--bar', '-v', '--baz', '-vv', '--qux', '-vvv'],
            'args'    => [[1 => '-v', 2 => '-vv', 3 => '-vvv'], 3, '--verbose'],
            'expect'  => ['--foo', '-vvv', '--bar', '--baz', '--qux'],
        ];
    }

    /**
     * @param list<string>       $options
     * @param SetLevelFlagArgs $args
     */
    #[DataProvider('provideSetLevelFlag')]
    public function testSetLevelFlag(array $options, array $args, mixed $expect): void
    {
        $setter = new CommandOptionSetter();

        self::assertSame($expect, $setter->setLevelFlag($options, ...$args));
    }

    /**
     * @psalm-return iterable<string, array{
     *      options: list<string>,
     *      args: SetStringValueArgs,
     *      expect: mixed,
     * }>
     */
    public static function provideSetStringValue(): iterable
    {
        yield pck(__FILE__, __LINE__) => [
            'options' => [],
            'args'    => ['--file', '/tmp/foo.txt'],
            'expect'  => ['--file', '/tmp/foo.txt'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--file', '1.txt', '--bar', '--file', '2.txt'],
            'args'    => ['--file', '3.txt'],
            'expect'  => ['--foo', '--file', '3.txt', '--bar'],
        ];

        yield pck(__FILE__, __LINE__) => [
            'options' => ['--foo', '--file', '1.txt', '--bar', '--file'],
            'args'    => ['--file', '3.txt'],
            'expect'  => ['--foo', '--file', '3.txt', '--bar'],
        ];
    }

    /**
     * @param list<string>       $options
     * @param SetStringValueArgs $args
     */
    #[DataProvider('provideSetStringValue')]
    public function testSetStringValue(array $options, array $args, mixed $expect): void
    {
        $setter = new CommandOptionSetter();

        self::assertSame($expect, $setter->setStringValue($options, ...$args));
    }
}
