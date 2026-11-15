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

final class PhpunitOptionsDefiner implements OptionsDefinerInterface
{
    /**
     * @psalm-template TNodeBuilder of NodeBuilder
     *
     * @psalm-param TNodeBuilder $nodeBuilder
     *
     * @psalm-return TNodeBuilder
     */
    public function addOptions(NodeBuilder $nodeBuilder): NodeBuilder
    {
        return $nodeBuilder
            // Code Coverage Options:
            ->stringNode('coverage_clover')->end()      // Generate code coverage report in Clover XML format
            ->stringNode('coverage_cobertura')->end()   // Generate code coverage report in Cobertura XML format
            ->stringNode('coverage_openclover')->end()  // >=12.2: Writes the code coverage report in OpenClover XML format to the specified file
            ->stringNode('coverage_crap4j')->end()      // Generate code coverage report in Crap4J XML format
            ->stringNode('coverage_html')->end()        // Generate code coverage report in HTML format
            ->stringNode('coverage_php')->end()         // Export PHP_CodeCoverage object to file
            ->stringNode('coverage_text')->end()        // Generate code coverage report in text format [default: standard output]
            ->stringNode('coverage_xml')->end()         // Generate code coverage report in PHPUnit XML format in this dir
            ->stringNode('coverage_cache')->end()       //  <10.0: Cache static analysis results in this dir
            ->booleanNode('warm_coverage_cache')->end() // Warm static analysis cache
            ->arrayNode('coverage_filter')              // Include <dir> in code coverage analysis
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->stringPrototype()->end()
            ->end()
            ->booleanNode('path_coverage')->end()       // Perform path coverage analysis
            ->booleanNode('disable_coverage_ignore')->end() // Disable annotations for ignoring code coverage
            ->booleanNode('no_coverage')->end()         // Ignore code coverage configuration

            // Logging Options:
            ->stringNode('log_junit')->end()            // Log test execution in JUnit XML format to file
            ->stringNode('log_teamcity')->end()         // Log test execution in TeamCity format to file
            ->stringNode('testdox_html')->end()         // Write agile documentation in HTML format to file
            ->stringNode('testdox_text')->end()         // Write agile documentation in Text format to file
            ->stringNode('testdox_xml')->end()          //  <10.0: Write agile documentation in XML format to file
            ->booleanNode('reverse_list')->end()        // Print defects in reverse order
            ->booleanNode('no_logging')->end()          // Ignore logging configuration

            // Test Selection Options:
            ->booleanNode('list_suites')->end()         // List available test suites
            ->stringNode('testsuite')->end()            // Filter which testsuite to run
            ->booleanNode('list_groups')->end()         // List available test groups
            ->stringNode('group')->end()                // Only runs tests from the specified group(s)
            ->arrayNode('exclude_group')                // Exclude tests from the specified group(s)
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->stringPrototype()->end()
            ->end()
            ->stringNode('covers')->end()               // Only runs tests annotated with "@covers <name>"
            ->stringNode('uses')->end()                 // Only runs tests annotated with "@uses <name>"
            ->booleanNode('list_tests')->end()          // List available tests
            ->stringNode('list_tests_xml')->end()       // List available tests in XML format
            ->stringNode('filter')->end()               // Filter which tests to run
            ->arrayNode('test_suffix')                  // Only search for test in files with specified suffix(es). Default: Test.php,.phpt
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->stringPrototype()->end()
            ->end()

            // Test Execution Options:
            ->booleanNode('dont_report_useless_tests')->end()   // Do not report tests that do not test anything
            ->booleanNode('strict_coverage')->end()         // Be strict about @covers annotation usage
            ->booleanNode('strict_global_state')->end()     // Be strict about changes to global state
            ->booleanNode('disallow_test_output')->end()    // Be strict about output during tests
            ->booleanNode('disallow_resource_usage')->end() //  <10.0: Be strict about resource usage during small tests
            ->booleanNode('enforce_time_limit')->end()      // Enforce time limit based on test size
            ->floatNode('default_time_limit')->end()        // Timeout in seconds for tests without @small, @medium or @large
            ->booleanNode('disallow_todo_tests')->end() //  <10.0: Disallow @todo_annotated tests

            ->booleanNode('process_isolation')->end()   // Run each test in a separate PHP process
            ->booleanNode('globals_backup')->end()      // Backup and restore $GLOBALS for each test
            ->booleanNode('static_backup')->end()       // Backup and restore static attributes for each test
            ->enumNode('colors')                        // Use colors in output ("never", "auto" or "always")
                ->values(['never', 'auto', 'always'])
            ->end()
            ->integerNode('columns')->end()             // Use maximum number of columns for progress output
            ->booleanNode('stderr')->end()              // Write to STDERR instead of STDOUT

            ->booleanNode('stop_on_defect')->end()      // Stop execution upon first not_passed test
            ->booleanNode('stop_on_deprecation')->end() // >=10.0: Stop execution upon first deprecation warning
            ->booleanNode('stop_on_error')->end()       // Stop execution upon first error
            ->booleanNode('stop_on_failure')->end()     // Stop execution upon first error or failure
            ->booleanNode('stop_on_incomplete')->end()  // Stop execution upon first incomplete test
            ->booleanNode('stop_on_notice')->end()      // >=10.0: Stop execution upon first that trigerred a notice
            ->booleanNode('stop_on_risky')->end()       // Stop execution upon first risky test
            ->booleanNode('stop_on_skipped')->end()     // Stop execution upon first skipped test
            ->booleanNode('stop_on_warning')->end()     // Stop execution upon first warning

            ->booleanNode('fail_on_all_issues')->end()  // >=10.0: Return a failure exit code when any issue is triggered
            ->booleanNode('fail_on_deprecation')->end() // >=10.0: Return a failure exit code when any test triggers a deprecation
            ->booleanNode('fail_on_empty_test_suite')->end() // >=10.0 Return a failure exit code when no tests were executed
            ->booleanNode('fail_on_incomplete')->end()  // Treat incomplete tests as failures
            ->booleanNode('fail_on_notice')->end()      // >=10.0: Return a failure exit code when any test triggers a notice
            ->booleanNode('fail_on_phpunit_deprecation')->end() // >=10.0: Return a failure exit code when PHPUnit deprecation is triggered
            ->booleanNode('fail_on_phpunit_notice')->end()      // >=10.0: Return a failure exit code when PHPUnit notice is triggered
            ->booleanNode('fail_on_phpunit_warning')->end()     // >=10.0: Return a failure exit code when PHPUnit warning is triggered
            ->booleanNode('fail_on_risky')->end()       // Treat risky tests as failures
            ->booleanNode('fail_on_skipped')->end()     // Treat skipped tests as failures
            ->booleanNode('fail_on_warning')->end()     // Treat tests with warnings as failures

            ->booleanNode('do_not_fail_on_deprecation')->end() // ...
            ->booleanNode('do_not_fail_on_empty_test_suite')->end() // ...
            ->booleanNode('do_not_fail_on_incomplete')->end()  // ...
            ->booleanNode('do_not_fail_on_notice')->end()      // ...
            ->booleanNode('do_not_fail_on_phpunit_deprecation')->end() // ...
            ->booleanNode('do_not_fail_on_phpunit_notice')->end()      // ...
            ->booleanNode('do_not_fail_on_phpunit_warning')->end()     // ...
            ->booleanNode('do_not_fail_on_risky')->end()       // ...
            ->booleanNode('do_not_fail_on_skipped')->end()     // ...
            ->booleanNode('do_not_fail_on_warning')->end()     // ...

    //    verbose: null                       // Output more verbose information
            ->booleanNode('debug')->end()               // Display debugging information

            ->integerNode('repeat')->end()              // Runs the test(s) repeatedly
            ->booleanNode('teamcity')->end()            // Report test execution progress in TeamCity format
            ->booleanNode('testdox')->end()             // Report test execution progress in TestDox format
            ->arrayNode('testdox_group')                //  <10.0: Only include tests from the specified group(s)
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->stringPrototype()->end()
            ->end()
            ->arrayNode('testdox_exclude_group')        //  <10.0: Exclude tests from the specified group(s)
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->stringPrototype()->end()
            ->end()
            ->stringNode('printer')->end()              //  <10.0: Specifies a class to use as result printer
            ->arrayNode('order_by')                     // Run tests in order. Supported values can be combined with a comma.
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->enumPrototype()
                    ->values([
                        'default',
                        'defects',
                        'depends',
                        'duration',
                        'no-depends',
                        'random',
                        'reverse',
                        'size',
                    ])
                ->end()
            ->end()
            ->integerNode('random_order_seed')->end()   // Use a specific random seed <N> for random order
            ->booleanNode('cache_result')->end()        // Write test results to cache file
            ->booleanNode('do_not_cache_result')->end() // Do not write test results to cache file

            // Configuration Options:
            ->stringNode('prepend')->end()              //  <10.0: A PHP script that is included as early as possible
            ->stringNode('bootstrap')->end()            // A PHP script that is included before the tests run
            ->stringNode('configuration')->end()        // Read configuration from XML file
            ->booleanNode('no_configuration')->end()    // Ignore default configuration file (phpunit.xml)
            ->arrayNode('extensions', 'extension')      // A comma separated list of PHPUnit extensions to load
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->stringPrototype()->end()
            ->end()
            ->booleanNode('no_extensions')->end()       // Do not load PHPUnit extensions
            ->arrayNode('include_path', 'include_dir')  // Prepend PHP's include_path with given path(s)
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->stringPrototype()->end()
            ->end()
            ->arrayNode('ini_set')                      // -d <key[=value]> Sets a php.ini value
                ->defaultNull()
                ->beforeNormalization()->castToArray()->end()
                ->stringPrototype()->end()
            ->end()
            ->stringNode('cache_result_file')->end()    //  <10.0: Specify result cache path and filename
            ->stringNode('cache_directory')->end()      // >=10.0: Directory where PHPUnit stores data between TS runs
        ;
    }
}
