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
use Tailors\Console\Workflows\CommandOptions\CommandOptionSetter;
use Tailors\Console\Workflows\CommandOptions\CommandOptionsDefinitionInterface;

/**
 * @internal
 *
 * @psalm-internal Tailors\Console\Workflows
 *
 * @var ArrayNodeDefinition $__phpactor__workaround__unused_import__ArrayNodeDefinition
 */
final class FixCommandOptionsDefinition implements CommandOptionsDefinitionInterface
{
    public function __construct(private CheckCommandOptionsDefinition $checkCommandOptionsDefinition) {}

    /**
     * @template TParent of ArrayNodeDefinition
     *
     * @param NodeBuilder<TParent> $nodeBuilder
     *
     * @return NodeBuilder<TParent>
     */
    public function addCommandOptionsDefinitions(NodeBuilder $nodeBuilder): NodeBuilder
    {
        // According to docs: "php-cs-fixer check" == "php-cs-fixer fix --dry-run".
        // So, "check" command nas no --dry-run, but "fix" command should have it.
        $nodeBuilder = $this->checkCommandOptionsDefinition->addCommandOptionsDefinitions($nodeBuilder);

        return $nodeBuilder
            ->booleanNode('dry_run')->end()
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
