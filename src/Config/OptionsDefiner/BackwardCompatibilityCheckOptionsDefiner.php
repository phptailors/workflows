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

final class BackwardCompatibilityCheckOptionsDefiner implements OptionsDefinerInterface
{
    public function addOptions(NodeBuilder $nodeBuilder): NodeBuilder
    {
        return $nodeBuilder
            ->stringNode('from')->end()
            ->stringNode('to')->end()
            ->booleanNode('install_development_dependencies')->end()
            ->enumNode('format')->values(['console', 'markdown', 'github-actions'])->end()
        ;
    }
}
