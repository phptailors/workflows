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
use Tailors\Console\Workflows\Config\OptionsDefiner\OptionsDefinerInterface;

final class ScriptConfigDefiner implements ConfigDefinerInterface
{
    /**
     * @psalm-param string[] $supportedScriptCommands
     */
    public function __construct(
        private string $defaultScriptName,
        private array $supportedScriptCommands,
        private OptionsDefinerInterface $optionsDefiner
    ) {}

    /**
     * @psalm-template TNodeBuilder of NodeBuilder
     *
     * @psalm-param TNodeBuilder $rootNode
     *
     * @psalm-return TNodeBuilder
     */
    public function addConfigNodes(NodeBuilder $nodeBuilder): NodeBuilder
    {
        return $nodeBuilder
            ->stringNode('script')->cannotBeEmpty()->defaultValue($this->defaultScriptName)->end()
            ->enumNode('command')->values($this->supportedScriptCommands)->end()
            ->append($this->getOptionsDefinition('options'))
            ->arrayNode('arguments', 'argument')->stringPrototype()->end()->end()
        ;
    }

    private function getOptionsDefinition(string $rootName): ArrayNodeDefinition
    {
        $treeBuilder = new TreeBuilder($rootName);

        $rootNode = $treeBuilder->getRootNode();

        $optionsBuilder = $rootNode->addDefaultsIfNotSet()->children();

        $this->optionsDefiner->addOptions($optionsBuilder);

        return $optionsBuilder->end();
    }
}
