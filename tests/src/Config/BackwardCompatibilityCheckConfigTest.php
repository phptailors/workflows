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
            'inputs' => [['options' => ['ansi' => true]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['ansi' => true]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['ansi' => false]]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['ansi' => false]]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['from' => 'FOO']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['from' => 'FOO']]),
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['options' => ['to' => 'FOO']]],
            'expect' => \array_replace_recursive($defaults, ['options' => ['to' => 'FOO']]),
        ];

//              ->stringNode('from')->end() // null
//              ->stringNode('to')->end() // null
//              ->booleanNode('install_development_dependencies')->end() // null
//              ->enumNode('format')->values(['console', 'markdown', 'github-actions'])->end() // null
    }

    /**
     * @return iterable<array{inputs:array, expect:string}>
     */
    public static function provideWithInvalidConfig(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['script' => null]],
            'expect' => '/"backward_compatibility_check.script" cannot contain an empty value/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['command' => 'FOO']],
            'expect' => '/"FOO" is not allowed for path "backward_compatibility_check.command"/'
        ];
    }
}
