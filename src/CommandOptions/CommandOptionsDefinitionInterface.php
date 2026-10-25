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
interface CommandOptionsDefinitionInterface
{
    /**
     * @template TParent of ArrayNodeDefinition
     * @param NodeBuilder<TParent> $nodeBuilder
     * @return NodeBuilder<TParent>
     */
    public function addOptionsDefinitions(NodeBuilder $nodeBuilder): NodeBuilder;
}
