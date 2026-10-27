<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Option;

/**
 * @internal
 *
 * @psalm-internal Tailors\Console\Workflows
 */
abstract class AbstractOption
{
    protected function __construct(
        protected readonly string $optionName,
        protected readonly string $configKey,
    ) {}

    final protected static function longOptToSnake(string $optionName): ?string
    {
        if (!preg_match('/^--(?<kebab>\w+(?:-\w+))$/', $optionName, $captures)) {
            return null;
        }

        return strtolower(str_replace('-', '_', $captures['kebab']));
    }

    /**
     * @param list<string> $options
     * @param array<string> $removed
     *
     * @return list<string>
     */
    final protected function setBooleanFlag(array $options, string $name, ?bool $value, ?string $opposite, array $removed = []): array
    {
        if (true === $value || false === $value && null !== $opposite) {
            if (count($removed) > 0) {
                ksort($removed);
                $first = array_key_first($removed);
                $options[$first] = $value ? $name : $opposite;
            } else {
                $options[] = $name;
            }
        }

        ksort($options);

        return array_values($options);
    }
}
