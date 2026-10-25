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

final class PhpCsFixerConfig extends AbstractScriptConfig
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
        return 'php_cs_fixer';
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
                ->enumNode('path_mode')->values(['override', 'intersection'])->end()
                ->booleanNode('allow_risky')->end()
                ->stringNode('config')->end()
                ->arrayNode('rules', 'rule')
                    ->stringPrototype()->end()
                ->end()
                ->booleanNode('using_cache')->end()
                ->booleanNode('allow_unsupported_php_version')->end()
                ->stringNode('cache_file')->end()
                ->booleanNode('diff')->end()
                ->enumNode('format')->values([
                    '@auto',
                    'txt', '@auto,txt',
                    'checkstyle', '@auto,checkstyle',
                    'gitlab', '@auto,gitlab',
                    'json', '@auto,json',
                    'junit', '@auto,junit',
                    'xml', '@auto,xml',
                ])->end()
                ->booleanNode('stop_on_violation')->end()
                ->booleanNode('show_progress')->end()
                ->booleanNode('sequential')->end()
            ->end()
        ;
    }
}
