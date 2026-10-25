<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows;

use Tailors\Console\Workflows\Utils\TestUtils;

/**
 * @internal
 */
function providerCaseKey(string $file, int $line, mixed ...$args): string
{
    return TestUtils::providerCaseKey($file, $line, ...$args);
}
