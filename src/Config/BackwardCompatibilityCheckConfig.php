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
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

final class BackwardCompatibilityCheckConfig extends AbstractScriptConfig
{
    use SymfonyOptionsDefinitionTrait;

    private static array $supportedScriptCommands = [
        'roave-backwards-compatibility-check:assert-backwards-compatible' => 'assert_backwards_compatible',
    ];

    protected function getDefaultScriptName(): string
    {
        return 'roave-backward-compatibility-check';
    }

    /**
     * @return list<string>
     */
    protected function getSupportedScriptCommands(): array
    {
        return array_keys(self::$supportedScriptCommands);
    }

    protected function getRootNodeName(): string
    {
        return 'backward_compatibility_check';
    }

    protected function getOptionsDefinition(string $rootName): ArrayNodeDefinition
    {
        $treeBuilder = new TreeBuilder($rootName);

        $rootNode = $treeBuilder->getRootNode();

        $commandRoot = self::$supportedScriptCommands['roave-backwards-compatibility-check:assert-backwards-compatible'];

        return $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->append($this->getSymfonyOptionsDefinition('common'))
                ->append($this->getCommandOptionsDefinition('assert_backwards_compatible'))
            ->end()
        ;
    }

    private function getCommandOptionsDefinition(string $rootName): ArrayNodeDefinition
    {
        $treeBuilder = new TreeBuilder($rootName);

        $rootNode = $treeBuilder->getRootNode();

        $children = $rootNode->children();

        $this->addSymfonyOptionDefinitions($children);
        $this->addCommandOptionsDefinition($children);

        $children->end();

        return $rootNode;
    }

    private function addCommandOptionsDefinition(NodeBuilder $nodeBuilder): void
    {
        $nodeBuilder
            ->stringNode('from')->end()
            ->stringNode('to')->end()
            ->booleanNode('install_development_dependencies')->end()
            ->enumNode('format')->values(['console', 'markdown', 'github-actions'])->end()
        ;
    }
}
