<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config\OptionsDefiner;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;

final class ChainedOptionsDefiner implements OptionsDefinerInterface
{
    /**
     * @psalm-param list<OptionsDefinerInterface> $optionsDefiners
     */
    public function __construct(private array $optionsDefiners) {}

    public function addOptions(NodeBuilder $nodeBuilder): NodeBuilder
    {
        foreach ($this->optionsDefiners as $optionsDefiner) {
            $nodeBuilder = $optionsDefiner->addOptions($nodeBuilder);
        }
        return $nodeBuilder;
    }
}
