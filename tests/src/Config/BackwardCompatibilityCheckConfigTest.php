<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config;

use PHPUnit\Framework\Attributes\CoversClass;

/**
 * @internal
 */
#[CoversClass(BackwardCompatibilityCheckConfig::class)]
#[CoversClass(BackwardCompatibilityCheckConfigTest::class)]
#[CoversClass(AbstractConfigTestCase::class)]
final class BackwardCompatibilityCheckConfigTest extends AbstractConfigTestCase
{
    use ProvideCommonSettingsTrait;
    use ProvideSymfonyOptionsTrait;

    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithValidConfig(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'roave-backwards-compatibility-check:assert-backwards-compatible']],
            'expect' => ['command' => 'roave-backwards-compatibility-check:assert-backwards-compatible'],
        ];

        yield from self::provideValidCommonSettings();

        yield from self::provideValidSymfonyOptions('common');

        yield from self::provideValidSymfonyOptions('assert_backwards_compatible');

        yield from self::provideValidCommandOptions('assert_backwards_compatible');
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideWithInvalidConfig(): iterable
    {
        yield from self::provideInvalidCommonSettings('backward_compatibility_check');

        yield from self::provideInvalidSymfonyOptions('backward_compatibility_check', 'common');

        yield from self::provideInvalidSymfonyOptions('backward_compatibility_check', 'assert_backwards_compatible');

        yield from self::provideInvalidCommandOptions('backward_compatibility_check', 'assert_backwards_compatible');
    }

    /**
     * @psalm-return array{
     *      srcript?: string,
     *      options?: array<string,mixed>,
     *      arguments?: list<string>
     * }
     */
    protected static function configDefaults(): array
    {
        return [
            'script'    => 'roave-backward-compatibility-check',
            'options'   => [],
            'arguments' => [],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    private static function provideValidCommandOptions(string $rootName): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['from' => null]]]],
            'expect' => ['options' => [$rootName => ['from' => '']]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['from' => 'FOO']]]],
            'expect' => ['options' => [$rootName => ['from' => 'FOO']]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['to' => null]]]],
            'expect' => ['options' => [$rootName => ['to' => '']]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['to' => 'FOO']]]],
            'expect' => ['options' => [$rootName => ['to' => 'FOO']]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['install_development_dependencies' => null]]]],
            'expect' => ['options' => [$rootName => ['install_development_dependencies' => true]]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['install_development_dependencies' => true]]]],
            'expect' => ['options' => [$rootName => ['install_development_dependencies' => true]]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['install_development_dependencies' => false]]]],
            'expect' => ['options' => [$rootName => ['install_development_dependencies' => false]]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['format' => 'console']]]],
            'expect' => ['options' => [$rootName => ['format' => 'console']]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['format' => 'markdown']]]],
            'expect' => ['options' => [$rootName => ['format' => 'markdown']]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['format' => 'github-actions']]]],
            'expect' => ['options' => [$rootName => ['format' => 'github-actions']]],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['format' => 'github-actions']]]],
            'expect' => ['options' => [$rootName => ['format' => 'github-actions']]],
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    private static function provideInvalidCommandOptions(string $pathBase, string $rootName): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['from' => 123]]]],
            'expect' => '/Invalid type for path "'.$pathBase.'\.options\.'.$rootName.'\.from"\. Expected "string", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['to' => 123]]]],
            'expect' => '/Invalid type for path "'.$pathBase.'\.options\.'.$rootName.'\.to"\. Expected "string", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['install_development_dependencies' => 123]]]],
            'expect' => '/Invalid type for path "'.$pathBase.'\.options\.'.$rootName.'\.install_development_dependencies"\. Expected "bool", but got "int"/',
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => [$rootName => ['format' => 123]]]],
            'expect' => '/The value 123 is not allowed for path "'.$pathBase.'\.options\.'.$rootName.'\.format"/',
        ];
    }
}
