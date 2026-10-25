<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Utils;

/**
 * @internal
 */
final class TestUtils
{
    public static function providerCaseKey(string $file, int $line, mixed ...$args): string
    {
        $argsAsStrings = array_map(fn (mixed $v): string => (string) $v, $args);
        return basename($file).':'.((string) $line).([] === $argsAsStrings ? '' : ' ('.implode(', ', $argsAsStrings).')');
    }
}
