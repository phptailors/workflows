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
interface CommandOptionInterface
{
    /**
     * @param list<string> $options
     * @param array<string, mixed> $config
     *
     * @return list<string>
     */
    public function setOptionFromConfig(array $options, array $config): array;
}
