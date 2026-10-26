<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

/**
 * @internal
 *
 * @psalm-internal Tailors\Console\Workflows
 *
 * @var ArrayNodeDefinition $__phpactor__workaround__unused_import__ArrayNodeDefinition
 */
final class CommandOptionsDefinitionChain implements CommandOptionsDefinitionInterface
{
    /**
     * @param array<CommandOptionsDefinitionInterface> $commandOptionsDefinitions
     */
    public function __construct(private array $commandOptionsDefinitions) {}

    /**
     * @template TParent of ArrayNodeDefinition
     *
     * @param NodeBuilder<TParent> $nodeBuilder
     *
     * @return NodeBuilder<TParent>
     */
    public function addCommandOptionsDefinitions(NodeBuilder $nodeBuilder): NodeBuilder
    {
        foreach ($this->commandOptionsDefinitions as $commandOptionsDefinition) {
            $nodeBuilder = $commandOptionsDefinition->addCommandOptionsDefinitions($nodeBuilder);
        }

        return $nodeBuilder;
    }

    /**
     * @param list<string>         $options
     * @param array<string, mixed> $config
     *
     * @return list<string>
     */
    public function setCommandOptions(CommandOptionSetter $setter, array $options, array $config): array
    {
        foreach ($this->commandOptionsDefinitions as $commandOptionsDefinition) {
            $options = $commandOptionsDefinition->setCommandOptions($setter, $options, $config);
        }

        return $options;
    }
}
