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
use Symfony\Component\Config\Definition\ConfigurationInterface;

abstract class AbstractScriptConfig implements ConfigurationInterface
{
    final public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('backward_compatibility_check');

        $rootNode = $treeBuilder->getRootNode();

        $this->defineConfigTree($rootNode);

        return $treeBuilder;
    }

    abstract protected function getDefaultScriptName(): string;

    /**
     * @return list<string>
     */
    abstract protected function getSupportedScriptCommands(): array;

    abstract protected function getOptionsNode(): ArrayNodeDefinition;

    /**
     * @param ArrayNodeDefinition $rootNode
     */
    private function defineConfigTree(ArrayNodeDefinition $rootNode): void
    {
        $rootNode
            ->children()
            ->stringNode('script')
            ->cannotBeEmpty()
            ->defaultValue($this->getDefaultScriptName())
            ->end()
            ->enumNode('command')
            ->values($this->getSupportedScriptCommands())
            ->end()
            ->append($this->getOptionsNode())
            ->arrayNode('arguments', 'argument')
            ->stringPrototype()->end()
            ->end()
            ->end()
        ;
    }
}
