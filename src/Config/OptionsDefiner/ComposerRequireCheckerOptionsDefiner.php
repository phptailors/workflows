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

final class ComposerRequireCheckerOptionsDefiner implements OptionsDefinerInterface
{
    public function addOptions(NodeBuilder $nodeBuilder): NodeBuilder
    {
        return $nodeBuilder
            ->booleanNode('ignore_parse_errors')->end()
            ->enumNode('output')->values(['text', 'json'])->end()
            ->stringNode('config_file')->end()
        ;
    }
}
