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
     * @param NodeBuilder<TParent> $nodeBuilder
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
     * @param list<string> $options
     * @param array<string, mixed> $config
     *
     * @psalm-param-out list<string> $options
     */
    public function setCommandOptionsFromConfig(array &$options, array $config): void
    {
        if (is_bool($no_interactions = ($config['no_interactions'] ?? null))) {
            self::setBooleanOption($options, '--no-interactions', $no_interactions);
        }
        //        if (true === ($config['no_interactions'] ?? null)) {
        //            $options[] = '--no-interactions';
        //        }
        //
        //        $ansi = $config['ansi'] ?? null;
        //        if (true === $ansi) {
        //            $options[] = '--ansi';
        //        } elseif (false === $ansi) {
        //            $options[] = '--no-ansi';
        //        }
        //
        //        if (true === ($config['quiet'] ?? null)) {
        //            $options[] = '--quiet';
        //        }
        //
        //        if (true === ($config['silent'] ?? null)) {
        //            $options[] = '--silent';
        //        }
        //
        //        match ($config['verbose'] ?? null) {
        //            true => ($options[] = '--verbose'),
        //            1    => ($options[] = '-v'),
        //            2    => ($options[] = '-vv'),
        //            3    => ($options[] = '-vvv')
        //        };

    }
}
