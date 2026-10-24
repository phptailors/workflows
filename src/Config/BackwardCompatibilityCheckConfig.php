<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

final class BackwardCompatibilityCheckConfig extends AbstractScriptConfig
{
    protected function getDefaultScriptName(): string
    {
        return 'roave-backward-compatibility-check';
    }

    /**
     * @return list<string>
     */
    protected function getSupportedScriptCommands(): array
    {
        return [
            'roave-backwards-compatibility-check:assert-backwards-compatible',
        ];
    }

    protected function getOptionsNode(): ArrayNodeDefinition
    {
        $treeBuilder = new TreeBuilder('options');

        $rootNode = $treeBuilder->getRootNode();

        return $rootNode
            ->addDefaultsIfNotSet()
            ->children()
            ->booleanNode('no_interactions')->defaultTrue()->end()
            ->booleanNode('ansi')->defaultTrue()->end()
            ->stringNode('from')->end()
            ->stringNode('to')->end()
            ->booleanNode('install_development_dependencies')->end()
            ->enumNode('format')->values(['console', 'markdown', 'github-actions'])->end()
            ->end()
        ;
    }
}
