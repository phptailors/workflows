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
interface CommandOptionSetterInterface
{
    /**
     * @param list<string> $options
     *
     * @return list<string>
     */
    public function setBooleanFlag(array $options, string $name, ?bool $value, ?string $opposite = null): array;

    /**
     * @template TNames of array<int,string>
     *
     * @param list<string> $options
     * @param bool|key-of<TNames>|null $value
     * @param TNames $names
     *
     * @return list<string>
     */
    public function setLevelFlag(array $options, array $names, bool|int|null $value, ?string $name = null, ?string $opposite = null): array;

    /**
     * @param list<string> $options
     *
     * @return list<string>
     */
    public function setStringValue(array $options, string $name, string $value): array;

    /**
     * @param list<string> $options
     * @param array<string, mixed> $config
     * @return list<string>
     */
    public function setCommandOptions(array $options, array $config, array $mappings): array;
}
