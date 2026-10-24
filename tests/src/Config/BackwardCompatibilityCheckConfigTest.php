<?php declare(strict_types=1);

namespace Tailors\Console\Workflows\Config;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Tailors\PHPUnit\RecursivelyKsortedArrayIdenticalToTrait;

#[CoversClass(BackwardCompatibilityCheckConfig::class)]
#[CoversClass(BackwardCompatibilityCheckConfigTest::class)]
final class BackwardCompatibilityCheckConfigTest extends TestCase
{
    use RecursivelyKsortedArrayIdenticalToTrait;

    /**
     * @param array $inputs
     * @param array $expect
     */
    #[DataProvider("provideWithValidConfig")]
    public function testWithValidConfig(array $inputs, array $expect): void
    {
        $processor = new Processor();
        $config = new BackwardCompatibilityCheckConfig();
        $processedConfig = $processor->processConfiguration($config, $inputs);
        $this->assertRecursivelyKsortedArrayIdenticalTo($expect, $processedConfig);
    }

    /**
     * @param array $inputs
     */
    #[DataProvider("provideWithInvalidConfig")]
    public function testWithInvalidConfig(array $inputs, string $expect): void
    {
        $processor = new Processor();
        $config = new BackwardCompatibilityCheckConfig();

        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessageMatches($expect);

        $processedConfig = $processor->processConfiguration($config, $inputs);
    }

    /**
     * @return iterable<array{inputs:array, expect:array}>
     */
    public static function provideWithValidConfig(): iterable
    {
        $defaults = [
            'script' => 'roave-backward-compatibility-check',
            'options' => [
                'no_interactions' => true,
                'ansi' => true
            ],
            'arguments' => [],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [[]],
            'expect' => \array_merge($defaults, [])
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [[]],
            'expect' => $defaults,
        ];


        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => 'FOO']],
            'expect' => \array_merge($defaults, ['script' => 'FOO'])
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => 'FOO'], ['script' => 'BAR']],
            'expect' => \array_merge($defaults, ['script' => 'BAR'])
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'roave-backwards-compatibility-check:assert-backwards-compatible']],
            'expect' => \array_merge($defaults, ['command' => 'roave-backwards-compatibility-check:assert-backwards-compatible'])
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => []]],
            'expect' => $defaults,
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => []]],
            'expect' => $defaults,
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => true]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['no_interactions' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => false]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['no_interactions' => false]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => null]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['ansi' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => true]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['ansi' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => false]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['ansi' => false]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['from' => null]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['from' => '']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['from' => 'FOO']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['from' => 'FOO']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['to' => null]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['to' => '']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['to' => 'FOO']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['to' => 'FOO']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['install_development_dependencies' => null]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['install_development_dependencies' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['install_development_dependencies' => true]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['install_development_dependencies' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['install_development_dependencies' => false]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['install_development_dependencies' => false]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'console']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['format' => 'console']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'markdown']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['format' => 'markdown']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'github-actions']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['format' => 'github-actions']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 'github-actions']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['format' => 'github-actions']]),
        ];
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    public static function provideWithInvalidConfig(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => null]],
            'expect' => '/"backward_compatibility_check\.script" cannot contain an empty value/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => null]],
            'expect' => '/The value of type "null" is not allowed for path "backward_compatibility_check\.command"/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'FOO']],
            'expect' => '/The value "FOO" is not allowed for path "backward_compatibility_check\.command"/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['inexistent_option' => null]]],
            'expect' => '/Unrecognized option "inexistent_option" under "backward_compatibility_check\.options"\./'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['no_interactions' => 'FOO']]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.no_interactions"\. Expected "bool", but got "string"/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => 'FOO']]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.ansi"\. Expected "bool", but got "string"\./'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['from' => 123]]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.from"\. Expected "string", but got "int"\./'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['to' => 123]]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.to"\. Expected "string", but got "int"\./'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['install_development_dependencies' => 123]]],
            'expect' => '/Invalid type for path "backward_compatibility_check\.options\.install_development_dependencies"\. Expected "bool", but got "int"\./'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['format' => 123]]],
            'expect' => '/The value 123 is not allowed for path "backward_compatibility_check\.options\.format"\./'
        ];
    }
}
