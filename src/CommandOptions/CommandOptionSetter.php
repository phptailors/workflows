<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions;

/**
 * @internal
 *
 * @psalm-internal Tailors\Console\Workflows
 */
final class CommandOptionSetter
{
    /**
     * @param list<string> $options
     *
     * @psalm-param-out list<string> $options
     */
    public static function setBooleanFlag(array &$options, string $name, bool $value, ?string $opposite = null): void
    {
        $found = [array_search($name, $options, true)];

        if (null !== $opposite) {
            $found[] = array_search($opposite, $options, true);
        }

        $found = array_filter($found, fn (int|false $key) => false !== $key);

        $options = array_filter($options, fn (string $v) => ($v !== $name && $v !== $opposite));

        if (count($found) > 0) {
            sort($found);
            $first = reset($found);
            $options[$first] = $name;
            $options = array_values($options);
        } else {
            $options[] = $name;
        }
    }
}
