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
abstract class AbstractCommandOption
{
    protected function __construct(
        protected readonly string $configKey,
        protected readonly string $optionName,
        protected readonly CommandOptionSetterInterface $optionSetter
    ) {}

    final protected static function configKeyToOptionName(string $configKey): string
    {
        return '--'.preg_replace('/[^a-zA-Z0-9]/g', '-', trim($configKey));
    }
}
