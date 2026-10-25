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

final class ComposerRequireCheckerConfig extends AbstractScriptConfig
{
    protected function getDefaultScriptName(): string
    {
        return 'composer-require-checker';
    }

    /**
     * @return list<string>
     */
    protected function getSupportedScriptCommands(): array
    {
        return [
            'check',
        ];
    }

    protected function getRootNodeName(): string
    {
        return 'composer_require_checker';
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
                ->booleanNode('silent')->end()
                ->booleanNode('quiet')->end()
                ->booleanNode('ignore_parse_errors')->end()
                ->enumNode('output')->values(['text', 'json'])->end()
                ->stringNode('config_file')->end()
            ->end()
        ;
    }
}
