<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config\OptionsDefiner;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;

interface OptionsDefinerInterface
{
    /**
     * @psalm-template TNodeBuilder of NodeBuilder
     *
     * @psalm-param TNodeBuilder $nodeBuilder
     *
     * @psalm-return TNodeBuilder
     */
    public function addOptions(NodeBuilder $nodeBuilder): NodeBuilder;
}
