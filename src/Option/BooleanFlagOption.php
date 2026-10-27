<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Option;

/**
 * @internal
 *
 * @psalm-internal Tailors\Console\Workflows
 */
final class BooleanFlagOption extends AbstractCommandOption implements CommandOptionInterface
{
    public static function create(
        string $configKey,
        ?string $optionName = null,
        ?string $oppositeOptionName = null,
        CommandOptionSetterInterface $optionSetter = null
    ): BooleanFlagOption {
        $optionName ??= self::configKeyToOptionName($configKey);
        $optionSetter ??= new CommandOptionSetter();
        return new self($configKey, $optionName, $optionSetter, $oppositeOptionName);
    }

    private function __construct(
        string $configKey,
        string $optionName,
        CommandOptionSetterInterface $optionSetter,
        private readonly string $oppositeOptionName
    ) {
        parent::__construct($configKey, $optionName, $optionSetter);
    }

    /**
     * @param list<string> $options
     * @param array<string, mixed> $config
     *
     * @return list<string>
     */
    public function setOptionFromConfig(array $options, array $config): array
    {
        if (array_key_exists($this->configKey, $config) && in_array([true, false, null], $value = $config[$this->configKey], true)) {
            $options = $this->optionSetter->setBooleanFlag($options, $this->optionName, $value, $this->oppositeOptionName);
        }

        return $options;
    }
}
