<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions\ComposerRequireChecker;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Tailors\Console\Workflows\CommandOptions\CommandOptionSetter;
use Tailors\Console\Workflows\CommandOptions\CommandOptionsDefinitionInterface;

/**
 * @internal
 *
 * @psalm-internal Tailors\Console\Workflows
 *
 * @var ArrayNodeDefinition $__phpactor__workaround__unused_import__ArrayNodeDefinition
 */
final class CheckCommandOptionsDefinition implements CommandOptionsDefinitionInterface
{
    /**
     * @template TParent of ArrayNodeDefinition
     *
     * @param NodeBuilder<TParent> $nodeBuilder
     *
     * @return NodeBuilder<TParent>
     */
    public function addCommandOptionsDefinitions(NodeBuilder $nodeBuilder): NodeBuilder
    {
        return $nodeBuilder
            ->booleanNode('ignore_parse_errors')->end()
            ->enumNode('output')->values(['text', 'json'])->end()
            ->stringNode('config_file')->end()
        ;
    }

    /**
     * @param list<string>         $options
     * @param array<string, mixed> $config
     *
     * @return list<string>
     */
    public function setCommandOptions(CommandOptionSetter $setter, array $options, array $config): array
    {
        return $options;
    }
}
