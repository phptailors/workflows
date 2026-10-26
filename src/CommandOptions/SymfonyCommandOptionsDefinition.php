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
final class SymfonyCommandOptionsDefinition implements CommandOptionsDefinitionInterface
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
            ->booleanNode('no_interactions')->end()
            ->booleanNode('ansi')->end()
            ->booleanNode('silent')->end()
            ->booleanNode('quiet')->end()
            ->enumNode('verbose')->values([false, true, 0, 1, 2, 3])->end()
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
        foreach (
            [
                'no_interactions' => '--no-interactions',
                'quiet' => '--quiet',
                'silent' => '--silent',
            ] as $key => $name) {
            if (array_key_exists($key, $config) && in_array([true, false, null], $value = $config[$key], true)) {
                $options = $setter->setBooleanFlag($options, $name, $value);
            }
        }

        if (array_key_exists('ansi', $config) && in_array([true, false, null], $value = $config['ansi'], true)) {
            $options = $setter->setBooleanFlag($options, '--ansi', $value, '--no-ansi');
        }

        if (array_key_exists('verbose', $config) && in_array([true, false, null, 1, 2, 3], $value = $config['verbose'], true)) {
            $options = $setter->setLevelFlag($options, [1 => '-v', 2 => '-vv', 3 => '-vvv'], $value, '--verbose');
        }

        return $options;
    }
}
