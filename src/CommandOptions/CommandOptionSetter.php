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
     * @return list<string>
     */
    public function setBooleanFlag(array $options, string $name, ?bool $value, ?string $opposite = null): array
    {
        $remove = array_merge(array_filter([$name, $opposite]));
        $remove = array_unique($remove);

        $removed = array_intersect($options, $remove);
        $remaining = array_diff($options, $remove);

        return $this->doSetBooleanFlag($remaining, $name, $value, $opposite, $removed);
    }

    /**
     * @template TNames of array<int,string>
     *
     * @param list<string> $options
     * @param bool|key-of<TNames>|null $value
     * @param TNames $names
     *
     * @return list<string>
     */
    public function setLevelFlag(array $options, array $names, bool|int|null $value, ?string $name = null, ?string $opposite = null): array
    {
        $remove = array_merge(array_values($names), array_filter([$name, $opposite]));
        $remove = array_unique($remove);

        $removed = array_intersect($options, $remove);
        $remaining = array_diff($options, $remove);

        if ((is_bool($value) || null === $value) && null !== $name) {
            return $this->doSetBooleanFlag($remaining, $name, $value, $opposite, $removed);
        }

        if (is_int($value) && array_key_exists($value, $names)) {
            return $this->doSetBooleanFlag($remaining, $names[$value], true, $opposite, $removed);
        }

        return $options;
    }

    /**
     * @param list<string> $options
     *
     * @return list<string>
     */
    public function setStringValue(array $options, string $name, string $value): array
    {
        $removed = array_intersect($options, [$name]);

        foreach ($removed as $index => $_) {
            $next = 1 + $index;
            if (array_key_exists($next, $options) && !array_key_exists($next, $removed)) {
                $removed[$next] = $options[$next];
            }
        }

        ksort($removed);

        $options = array_diff_key($options, $removed);

        if (count($removed) > 1) {
            $first = array_key_first($removed);
            $next = $first + 1;

            if (array_key_exists($next, $removed) && !array_key_exists($next, $options)) {
                $options[$first] = $name;
                $options[$next] = $value;
            } else {
                $options[] = $name;
                $options[] = $value;
            }
        } else {
            $options[] = $name;
            $options[] = $value;
        }

        ksort($options);

        return array_values($options);
    }

    /**
     * @param list<string> $options
     * @param array<string> $removed
     *
     * @return list<string>
     */
    private function doSetBooleanFlag(array $options, string $name, ?bool $value, ?string $opposite, array $removed): array
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
