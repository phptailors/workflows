<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\CommandOptions\PhpCsFixer;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
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
     * @param NodeBuilder<TParent> $nodeBuilder
     * @return NodeBuilder<TParent>
     */
    public function addOptionsDefinitions(NodeBuilder $nodeBuilder): NodeBuilder
    {
        return $nodeBuilder
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
              ->enumNode('show_progress')->values(['bar', 'dots', 'none'])->end()
              ->booleanNode('sequential')->end()
          ;
    }
}
