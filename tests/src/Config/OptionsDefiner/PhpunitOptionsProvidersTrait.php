<?php declare(strict_types=1);

/*
 * This file is part of phptailors/workflows.
 *
 * Copyright (c) Paweł Tomulik <pawel@tomulik.pl>
 *
 * View the LICENSE file for full copyright and license information.
 */

namespace Tailors\Console\Workflows\Config\OptionsDefiner;


/**
 * @internal
 */
trait PhpunitOptionsProvidersTrait
{
    /**
     * @psalm-return iterable<array{inputs:array, expect:array}>
     *
     * @codeCoverageIgnore
     */
    public static function provideValidPhpunitOptions(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [[]],
            'expect' => [],
        ];

        // Code Coverage Options:
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_clover' => 'loremipsum']],
            'expect' => ['coverage_clover' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_cobertura' => 'loremipsum']],
            'expect' => ['coverage_cobertura' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_openclover' => 'loremipsum']],
            'expect' => ['coverage_openclover' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_crap4j' => 'loremipsum']],
            'expect' => ['coverage_crap4j' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_html' => 'loremipsum']],
            'expect' => ['coverage_html' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_php' => 'loremipsum']],
            'expect' => ['coverage_php' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_text' => 'loremipsum']],
            'expect' => ['coverage_text' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_xml' => 'loremipsum']],
            'expect' => ['coverage_xml' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_cache' => 'loremipsum']],
            'expect' => ['coverage_cache' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['warm_coverage_cache' => false]],
            'expect' => ['warm_coverage_cache' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['warm_coverage_cache' => true]],
            'expect' => ['warm_coverage_cache' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_filter' => 'dir']],
            'expect' => ['coverage_filter' => ['dir']]
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_filter' => ['dir1', 'dir2']]],
            'expect' => ['coverage_filter' => ['dir1', 'dir2']]
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['path_coverage' => false]],
            'expect' => ['path_coverage' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['path_coverage' => true]],
            'expect' => ['path_coverage' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disable_coverage_ignore' => false]],
            'expect' => ['disable_coverage_ignore' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disable_coverage_ignore' => true]],
            'expect' => ['disable_coverage_ignore' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_coverage' => false]],
            'expect' => ['no_coverage' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_coverage' => true]],
            'expect' => ['no_coverage' => true],
        ];

        // Logging Options:
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['log_junit' => 'loremipsum']],
            'expect' => ['log_junit' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['log_teamcity' => 'loremipsum']],
            'expect' => ['log_teamcity' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox_html' => 'loremipsum']],
            'expect' => ['testdox_html' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox_text' => 'loremipsum']],
            'expect' => ['testdox_text' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox_xml' => 'loremipsum']],
            'expect' => ['testdox_xml' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['reverse_list' => false]],
            'expect' => ['reverse_list' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['reverse_list' => true]],
            'expect' => ['reverse_list' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_logging' => false]],
            'expect' => ['no_logging' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_logging' => true]],
            'expect' => ['no_logging' => true],
        ];

        // Test Selection Options:
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_suites' => false]],
            'expect' => ['list_suites' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_suites' => true]],
            'expect' => ['list_suites' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testsuite' => 'ts']],
            'expect' => ['testsuite' => ['ts']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testsuite' => ['ts1', 'ts2']]],
            'expect' => ['testsuite' => ['ts1', 'ts2']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['exclude_testsuite' => 'ts']],
            'expect' => ['exclude_testsuite' => ['ts']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['exclude_testsuite' => ['ts1', 'ts2']]],
            'expect' => ['exclude_testsuite' => ['ts1', 'ts2']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_groups' => false]],
            'expect' => ['list_groups' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_groups' => true]],
            'expect' => ['list_groups' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['group' => 'grp']],
            'expect' => ['group' => ['grp']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['group' => ['grp1', 'grp2']]],
            'expect' => ['group' => ['grp1', 'grp2']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['exclude_group' => 'grp']],
            'expect' => ['exclude_group' => ['grp']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['exclude_group' => ['grp1', 'grp2']]],
            'expect' => ['exclude_group' => ['grp1', 'grp2']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['covers' => 'loremipsum']],
            'expect' => ['covers' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['uses' => 'loremipsum']],
            'expect' => ['uses' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_tests' => false]],
            'expect' => ['list_tests' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_tests' => true]],
            'expect' => ['list_tests' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_tests_xml' => 'loremipsum']],
            'expect' => ['list_tests_xml' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['filter' => 'loremipsum']],
            'expect' => ['filter' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['test_suffix' => 'Test.php']],
            'expect' => ['test_suffix' => ['Test.php']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['test_suffix' => ['Test.php', '.phpt']]],
            'expect' => ['test_suffix' => ['Test.php', '.phpt']],
        ];

        // Test Execution Options:
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['dont_report_useless_tests' => false]],
            'expect' => ['dont_report_useless_tests' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['dont_report_useless_tests' => true]],
            'expect' => ['dont_report_useless_tests' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['strict_coverage' => false]],
            'expect' => ['strict_coverage' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['strict_coverage' => true]],
            'expect' => ['strict_coverage' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['strict_global_state' => false]],
            'expect' => ['strict_global_state' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['strict_global_state' => true]],
            'expect' => ['strict_global_state' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_test_output' => false]],
            'expect' => ['disallow_test_output' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_test_output' => true]],
            'expect' => ['disallow_test_output' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_resource_usage' => false]],
            'expect' => ['disallow_resource_usage' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_resource_usage' => true]],
            'expect' => ['disallow_resource_usage' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['enforce_time_limit' => false]],
            'expect' => ['enforce_time_limit' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['enforce_time_limit' => true]],
            'expect' => ['enforce_time_limit' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['default_time_limit' => 1.23]],
            'expect' => ['default_time_limit' => 1.23],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_todo_tests' => false]],
            'expect' => ['disallow_todo_tests' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_todo_tests' => true]],
            'expect' => ['disallow_todo_tests' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['process_isolation' => false]],
            'expect' => ['process_isolation' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['process_isolation' => true]],
            'expect' => ['process_isolation' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['globals_backup' => false]],
            'expect' => ['globals_backup' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['globals_backup' => true]],
            'expect' => ['globals_backup' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['static_backup' => false]],
            'expect' => ['static_backup' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['static_backup' => true]],
            'expect' => ['static_backup' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['colors' => 'never']],
            'expect' => ['colors' => 'never'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['colors' => 'auto']],
            'expect' => ['colors' => 'auto'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['colors' => 'always']],
            'expect' => ['colors' => 'always'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['columns' => 123]],
            'expect' => ['columns' => 123],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stderr' => false]],
            'expect' => ['stderr' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stderr' => true]],
            'expect' => ['stderr' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_defect' => false]],
            'expect' => ['stop_on_defect' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_defect' => true]],
            'expect' => ['stop_on_defect' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_deprecation' => false]],
            'expect' => ['stop_on_deprecation' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_deprecation' => true]],
            'expect' => ['stop_on_deprecation' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_error' => false]],
            'expect' => ['stop_on_error' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_error' => true]],
            'expect' => ['stop_on_error' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_failure' => false]],
            'expect' => ['stop_on_failure' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_failure' => true]],
            'expect' => ['stop_on_failure' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_incomplete' => false]],
            'expect' => ['stop_on_incomplete' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_incomplete' => true]],
            'expect' => ['stop_on_incomplete' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_notice' => false]],
            'expect' => ['stop_on_notice' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_notice' => true]],
            'expect' => ['stop_on_notice' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_risky' => false]],
            'expect' => ['stop_on_risky' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_risky' => true]],
            'expect' => ['stop_on_risky' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_skipped' => false]],
            'expect' => ['stop_on_skipped' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_skipped' => true]],
            'expect' => ['stop_on_skipped' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_warning' => false]],
            'expect' => ['stop_on_warning' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_warning' => true]],
            'expect' => ['stop_on_warning' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_all_issues' => false]],
            'expect' => ['fail_on_all_issues' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_all_issues' => true]],
            'expect' => ['fail_on_all_issues' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_deprecation' => false]],
            'expect' => ['fail_on_deprecation' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_deprecation' => true]],
            'expect' => ['fail_on_deprecation' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_empty_test_suite' => false]],
            'expect' => ['fail_on_empty_test_suite' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_empty_test_suite' => true]],
            'expect' => ['fail_on_empty_test_suite' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_incomplete' => false]],
            'expect' => ['fail_on_incomplete' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_incomplete' => true]],
            'expect' => ['fail_on_incomplete' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_notice' => false]],
            'expect' => ['fail_on_notice' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_notice' => true]],
            'expect' => ['fail_on_notice' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_deprecation' => false]],
            'expect' => ['fail_on_phpunit_deprecation' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_deprecation' => true]],
            'expect' => ['fail_on_phpunit_deprecation' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_notice' => false]],
            'expect' => ['fail_on_phpunit_notice' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_notice' => true]],
            'expect' => ['fail_on_phpunit_notice' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_warning' => false]],
            'expect' => ['fail_on_phpunit_warning' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_warning' => true]],
            'expect' => ['fail_on_phpunit_warning' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_risky' => false]],
            'expect' => ['fail_on_risky' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_risky' => true]],
            'expect' => ['fail_on_risky' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_skipped' => false]],
            'expect' => ['fail_on_skipped' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_skipped' => true]],
            'expect' => ['fail_on_skipped' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_warning' => false]],
            'expect' => ['fail_on_warning' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_warning' => true]],
            'expect' => ['fail_on_warning' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_deprecation' => false]],
            'expect' => ['do_not_fail_on_deprecation' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_deprecation' => true]],
            'expect' => ['do_not_fail_on_deprecation' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_empty_test_suite' => false]],
            'expect' => ['do_not_fail_on_empty_test_suite' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_empty_test_suite' => true]],
            'expect' => ['do_not_fail_on_empty_test_suite' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_incomplete' => false]],
            'expect' => ['do_not_fail_on_incomplete' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_incomplete' => true]],
            'expect' => ['do_not_fail_on_incomplete' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_notice' => false]],
            'expect' => ['do_not_fail_on_notice' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_notice' => true]],
            'expect' => ['do_not_fail_on_notice' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_deprecation' => false]],
            'expect' => ['do_not_fail_on_phpunit_deprecation' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_deprecation' => true]],
            'expect' => ['do_not_fail_on_phpunit_deprecation' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_notice' => false]],
            'expect' => ['do_not_fail_on_phpunit_notice' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_notice' => true]],
            'expect' => ['do_not_fail_on_phpunit_notice' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_warning' => false]],
            'expect' => ['do_not_fail_on_phpunit_warning' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_warning' => true]],
            'expect' => ['do_not_fail_on_phpunit_warning' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_risky' => false]],
            'expect' => ['do_not_fail_on_risky' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_risky' => true]],
            'expect' => ['do_not_fail_on_risky' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_skipped' => false]],
            'expect' => ['do_not_fail_on_skipped' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_skipped' => true]],
            'expect' => ['do_not_fail_on_skipped' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_warning' => false]],
            'expect' => ['do_not_fail_on_warning' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_warning' => true]],
            'expect' => ['do_not_fail_on_warning' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['debug' => false]],
            'expect' => ['debug' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['debug' => true]],
            'expect' => ['debug' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['repeat' => 12]],
            'expect' => ['repeat' => 12],
        ];
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['teamcity' => false]],
            'expect' => ['teamcity' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['teamcity' => true]],
            'expect' => ['teamcity' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox' => false]],
            'expect' => ['testdox' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox' => true]],
            'expect' => ['testdox' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox_group' => 'tdg']],
            'expect' => ['testdox_group' => ['tdg']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox_group' => ['tdg1', 'tdg2']]],
            'expect' => ['testdox_group' => ['tdg1', 'tdg2']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox_exclude_group' => 'tdg']],
            'expect' => ['testdox_exclude_group' => ['tdg']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox_exclude_group' => ['tdg1', 'tdg2']]],
            'expect' => ['testdox_exclude_group' => ['tdg1', 'tdg2']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['printer' => 'loremipsum']],
            'expect' => ['printer' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['order_by' => 'default']],
            'expect' => ['order_by' => ['default']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['order_by' => ['default']]],
            'expect' => ['order_by' => ['default']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['order_by' => ['defects']]],
            'expect' => ['order_by' => ['defects']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['order_by' => ['default', 'defects', 'depends', 'duration', 'no-depends', 'random', 'reverse', 'size']]],
            'expect' => ['order_by' => ['default', 'defects', 'depends', 'duration', 'no-depends', 'random', 'reverse', 'size']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['random_order_seed' => 12]],
            'expect' => ['random_order_seed' => 12],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['cache_result' => false]],
            'expect' => ['cache_result' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['cache_result' => true]],
            'expect' => ['cache_result' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_cache_result' => false]],
            'expect' => ['do_not_cache_result' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_cache_result' => true]],
            'expect' => ['do_not_cache_result' => true],
        ];

        // Configuration Options:
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['prepend' => 'loremipsum']],
            'expect' => ['prepend' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['bootstrap' => 'loremipsum']],
            'expect' => ['bootstrap' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['configuration' => 'loremipsum']],
            'expect' => ['configuration' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_configuration' => false]],
            'expect' => ['no_configuration' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_configuration' => true]],
            'expect' => ['no_configuration' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['extensions' => 'ext']],
            'expect' => ['extensions' => ['ext']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['extensions' => ['ext1', 'ext2']]],
            'expect' => ['extensions' => ['ext1', 'ext2']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_extensions' => false]],
            'expect' => ['no_extensions' => false],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_extensions' => true]],
            'expect' => ['no_extensions' => true],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['include_path' => 'dir']],
            'expect' => ['include_path' => ['dir']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['include_path' => ['dir1', 'dir2']]],
            'expect' => ['include_path' => ['dir1', 'dir2']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['d' => 'a=A']],
            'expect' => ['d' => ['a=A']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['d' => ['a=A', 'b=B']]],
            'expect' => ['d' => ['a=A', 'b=B']],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['cache_result_file' => 'loremipsum']],
            'expect' => ['cache_result_file' => 'loremipsum'],
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['cache_directory' => 'loremipsum']],
            'expect' => ['cache_directory' => 'loremipsum'],
        ];

    }

    /**
     * @psalm-return iterable<array{inputs:array, expect:string}>
     *
     * @codeCoverageIgnore
     */
    public static function provideInvalidPhpunitOptions(): iterable
    {
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['inexistent_option' => null]],
            'expect' => '/Unrecognized option "inexistent_option" under "options"/',
        ];

        // Code Coverage Options:
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_clover' => false]],
            'expect' => '/Invalid type for path "options\.coverage_clover". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_cobertura' => false]],
            'expect' => '/Invalid type for path "options\.coverage_cobertura". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_openclover' => false]],
            'expect' => '/Invalid type for path "options\.coverage_openclover". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_crap4j' => false]],
            'expect' => '/Invalid type for path "options\.coverage_crap4j". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_html' => false]],
            'expect' => '/Invalid type for path "options\.coverage_html". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_php' => false]],
            'expect' => '/Invalid type for path "options\.coverage_php". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_text' => false]],
            'expect' => '/Invalid type for path "options\.coverage_text". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_xml' => false]],
            'expect' => '/Invalid type for path "options\.coverage_xml". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_cache' => false]],
            'expect' => '/Invalid type for path "options\.coverage_cache". Expected "string", but got "bool"\.$/'
        ];

        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['warm_coverage_cache' => '']],
            'expect' => '/Invalid type for path "options\.warm_coverage_cache". Expected "bool", but got "string"\.$/'
        ];

//            ->arrayNode('coverage_filter')              // Include <dir> in code coverage analysis
//                ->stringPrototype()->end()
//            ->end()
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['coverage_filter' => 123]],
            'expect' => '/Invalid type for path "options\.coverage_filter\.0". Expected "string", but got "int"\.$/'
        ];

//            ->booleanNode('path_coverage')->end()       // Perform path coverage analysis
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['path_coverage' => '']],
            'expect' => '/Invalid type for path "options\.path_coverage". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('disable_coverage_ignore')->end() // Disable annotations for ignoring code coverage
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disable_coverage_ignore' => '']],
            'expect' => '/Invalid type for path "options\.disable_coverage_ignore". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('no_coverage')->end()         // Ignore code coverage configuration
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_coverage' => '']],
            'expect' => '/Invalid type for path "options\.no_coverage". Expected "bool", but got "string"\.$/'
        ];

//            // Logging Options:
//            ->stringNode('log_junit')->end()            // Log test execution in JUnit XML format to file
//            ->stringNode('log_teamcity')->end()         // Log test execution in TeamCity format to file
//            ->stringNode('testdox_html')->end()         // Write agile documentation in HTML format to file
//            ->stringNode('testdox_text')->end()         // Write agile documentation in Text format to file
//            ->stringNode('testdox_xml')->end()          //  <10.0: Write agile documentation in XML format to file

//            ->booleanNode('reverse_list')->end()        // Print defects in reverse order
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['reverse_list' => '']],
            'expect' => '/Invalid type for path "options\.reverse_list". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('no_logging')->end()          // Ignore logging configuration
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_logging' => '']],
            'expect' => '/Invalid type for path "options\.no_logging". Expected "bool", but got "string"\.$/'
        ];
//
//            // Test Selection Options:
//            ->booleanNode('list_suites')->end()         // List available test suites
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_suites' => '']],
            'expect' => '/Invalid type for path "options\.list_suites". Expected "bool", but got "string"\.$/'
        ];

//            ->stringNode('testsuite')->end()            // Filter which testsuite to run
//            ->booleanNode('list_groups')->end()         // List available test groups
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_groups' => '']],
            'expect' => '/Invalid type for path "options\.list_groups". Expected "bool", but got "string"\.$/'
        ];

//            ->stringNode('group')->end()                // Only runs tests from the specified group(s)
//            ->arrayNode('exclude_group')                // Exclude tests from the specified group(s)
//                ->stringPrototype()->end()
//            ->end()
//            ->stringNode('covers')->end()               // Only runs tests annotated with "@covers <name>"
//            ->stringNdoe('uses')->end()                 // Only runs tests annotated with "@uses <name>"
//            ->booleanNode('list_tests')->end()          // List available tests
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['list_tests' => '']],
            'expect' => '/Invalid type for path "options\.list_tests". Expected "bool", but got "string"\.$/'
        ];

//            ->stringNode('list_tests_xml')->end()       // List available tests in XML format
//            ->stringNode('filter')->end()               // Filter which tests to run
//            ->arrayNode('test_suffix')                  // Only search for test in files with specified suffix(es). Default: Test.php,.phpt
//                ->stringPrototype()->end()
//            ->end()
//
//            // Test Execution Options:
//            ->booleanNode('dont_report_useless_tests')->end()   // Do not report tests that do not test anything
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['dont_report_useless_tests' => '']],
            'expect' => '/Invalid type for path "options\.dont_report_useless_tests". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode(strict_coverage)->end()           // Be strict about @covers annotation usage
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['strict_coverage' => '']],
            'expect' => '/Invalid type for path "options\.strict_coverage". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('strict_global_state')->end()     // Be strict about changes to global state
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['strict_global_state' => '']],
            'expect' => '/Invalid type for path "options\.strict_global_state". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('disallow_test_output')->end()    // Be strict about output during tests
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_test_output' => '']],
            'expect' => '/Invalid type for path "options\.disallow_test_output". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('disallow_resource_usage')->end() //  <10.0: Be strict about resource usage during small tests
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_resource_usage' => '']],
            'expect' => '/Invalid type for path "options\.disallow_resource_usage". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('enforce_time_limit')->end()      // Enforce time limit based on test size
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['enforce_time_limit' => '']],
            'expect' => '/Invalid type for path "options\.enforce_time_limit". Expected "bool", but got "string"\.$/'
        ];

//            ->floatNode('default_time_limit')->end()        // Timeout in seconds for tests without @small, @medium or @large
//            ->booleanNode('disallow_todo_tests')->end() //  <10.0: Disallow @todo_annotated tests
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['disallow_todo_tests' => '']],
            'expect' => '/Invalid type for path "options\.disallow_todo_tests". Expected "bool", but got "string"\.$/'
        ];

//
//            ->booleanNode('process_isolation')->end()   // Run each test in a separate PHP process
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['process_isolation' => '']],
            'expect' => '/Invalid type for path "options\.process_isolation". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('globals_backup')             // Backup and restore $GLOBALS for each test
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['globals_backup' => '']],
            'expect' => '/Invalid type for path "options\.globals_backup". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('static_backup')->end()       // Backup and restore static attributes for each test
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['static_backup' => '']],
            'expect' => '/Invalid type for path "options\.static_backup". Expected "bool", but got "string"\.$/'
        ];

//            ->enumNode('colors')                        // Use colors in output ("never", "auto" or "always")
//                ->values(['never', 'auto', 'always'])
//            ->end()
//            ->integerNode('columns')->end()             // Use maximum number of columns for progress output
//            ->booleanNode('stderr')->end()              // Write to STDERR instead of STDOUT
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stderr' => '']],
            'expect' => '/Invalid type for path "options\.stderr". Expected "bool", but got "string"\.$/'
        ];

//
//            ->booleanNode('stop_on_defect')->end()      // Stop execution upon first not_passed test
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_defect' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_defect". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('stop_on_deprecation')->end() // >=10.0: Stop execution upon first deprecation warning
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_deprecation' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_deprecation". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('stop_on_error')->end()       // Stop execution upon first error
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_error' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_error". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('stop_on_failure')->end()     // Stop execution upon first error or failure
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_failure' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_failure". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('stop_on_incomplete')->end()  // Stop execution upon first incomplete test
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_incomplete' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_incomplete". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('stop_on_notice')->end()      // >=10.0: Stop execution upon first that trigerred a notice
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_notice' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_notice". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('stop_on_risky')->end()       // Stop execution upon first risky test
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_risky' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_risky". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('stop_on_skipped')->end()     // Stop execution upon first skipped test
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_skipped' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_skipped". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('stop_on_warning')->end()     // Stop execution upon first warning
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['stop_on_warning' => '']],
            'expect' => '/Invalid type for path "options\.stop_on_warning". Expected "bool", but got "string"\.$/'
        ];

//
//            ->booleanNode('fail_on_all_issues')->end()  // >=10.0: Return a failure exit code when any issue is triggered
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_all_issues' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_all_issues". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_deprecation')->end() // >=10.0: Return a failure exit code when any test triggers a deprecation
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_deprecation' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_deprecation". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_empty_test_suite')->end() // >=10.0 Return a failure exit code when no tests were executed
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_empty_test_suite' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_empty_test_suite". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_incomplete')->end()  // Treat incomplete tests as failures
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_incomplete' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_incomplete". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_notice')->end()      // >=10.0: Return a failure exit code when any test triggers a notice
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_notice' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_notice". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_phpunit_deprecation')->end() // >=10.0: Return a failure exit code when PHPUnit deprecation is triggered
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_deprecation' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_phpunit_deprecation". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_phpunit_notice')->end()      // >=10.0: Return a failure exit code when PHPUnit notice is triggered
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_notice' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_phpunit_notice". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_phpunit_warning')->end()     // >=10.0: Return a failure exit code when PHPUnit warning is triggered
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_phpunit_warning' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_phpunit_warning". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_risky')->end()       // Treat risky tests as failures
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_risky' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_risky". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_skipped')->end()     // Treat skipped tests as failures
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_skipped' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_skipped". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('fail_on_warning')->end()     // Treat tests with warnings as failures
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['fail_on_warning' => '']],
            'expect' => '/Invalid type for path "options\.fail_on_warning". Expected "bool", but got "string"\.$/'
        ];

//
//            ->booleanNode('do_not_fail_on_deprecation')->end() // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_deprecation' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_deprecation". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_empty_test_suite')->end() // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_empty_test_suite' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_empty_test_suite". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_incomplete')->end()  // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_incomplete' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_incomplete". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_notice')->end()      // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_notice' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_notice". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_phpunit_deprecation')->end() // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_deprecation' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_phpunit_deprecation". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_phpunit_notice')->end()      // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_notice' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_phpunit_notice". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_phpunit_warning')->end()     // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_phpunit_warning' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_phpunit_warning". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_risky')->end()       // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_risky' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_risky". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_skipped')->end()     // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_skipped' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_skipped". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_fail_on_warning')->end()     // ...
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_fail_on_warning' => '']],
            'expect' => '/Invalid type for path "options\.do_not_fail_on_warning". Expected "bool", but got "string"\.$/'
        ];

//
//    //    verbose: null                       // Output more verbose information
//            ->booleanNode('debug')->end()               // Display debugging information
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['debug' => '']],
            'expect' => '/Invalid type for path "options\.debug". Expected "bool", but got "string"\.$/'
        ];

//
//            ->integerNode('repeat')->end()              // Runs the test(s) repeatedly
//            ->booleanNode('teamcity')->end()            // Report test execution progress in TeamCity format
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['teamcity' => '']],
            'expect' => '/Invalid type for path "options\.teamcity". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('testdox')->end()             // Report test execution progress in TestDox format
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['testdox' => '']],
            'expect' => '/Invalid type for path "options\.testdox". Expected "bool", but got "string"\.$/'
        ];

//            ->arrayNode('testdox_group')                //  <10.0: Only include tests from the specified group(s)
//                ->stringPrototype()->end()
//            ->end()
//            ->arrayNode('testdox_exclude_group')        //  <10.0: Exclude tests from the specified group(s)
//                ->stringPrototype()->end()
//            ->end()
//            ->stringNode('printer')->end()              //  <10.0: Specifies a class to use as result printer
//            ->arrayNode('order_by')                     // Run tests in order. Supported values can be combined with a comma.
//                ->enumPrototype()
//                    ->values([
//                        'default',
//                        'defects',
//                        'depends',
//                        'duration',
//                        'no-depends',
//                        'random',
//                        'reverse',
//                        'size',
//                    ])
//                ->end()
//            ->end()
//            ->integerNode('random_order_seed')->end()   // Use a specific random seed <N> for random order
//            ->booleanNode('cache_result')->end()        // Write test results to cache file
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['cache_result' => '']],
            'expect' => '/Invalid type for path "options\.cache_result". Expected "bool", but got "string"\.$/'
        ];

//            ->booleanNode('do_not_cache_result')->end() // Do not write test results to cache file
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['do_not_cache_result' => '']],
            'expect' => '/Invalid type for path "options\.do_not_cache_result". Expected "bool", but got "string"\.$/'
        ];

//
//            // Configuration Options:
//            ->stringNode('prepend')->end()              //  <10.0: A PHP script that is included as early as possible
//            ->stringNode('bootstrap')->end()            // A PHP script that is included before the tests run
//            ->stringNode('configuration')->end()        // Read configuration from XML file
//            ->booleanNode('no_configuration')->end()    // Ignore default configuration file (phpunit.xml)
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_configuration' => '']],
            'expect' => '/Invalid type for path "options\.no_configuration". Expected "bool", but got "string"\.$/'
        ];

//            ->arrayNode('extensions', 'extension')      // A comma separated list of PHPUnit extensions to load
//                ->stringPrototype()->end()
//            ->end()
//            ->booleanNode('no_extensions')->end()       // Do not load PHPUnit extensions
        yield basename(__FILE__).':'.__LINE__ => [
            'inputs' => [['no_extensions' => '']],
            'expect' => '/Invalid type for path "options\.no_extensions". Expected "bool", but got "string"\.$/'
        ];

//            ->arrayNode('include_path', 'include_dir')  // Prepend PHP's include_path with given path(s)
//                ->stringPrototype()->end()
//            ->end()
//            ->arrayNode('d')                      // -d <key[=value]> Sets a php.ini value
//                ->stringPrototype()->end()
//            ->end()
//            ->stringNode('cache_result_file')->end()    //  <10.0: Specify result cache path and filename
//            ->stringNode('cache_directory')->end()      // >=10.0: Directory where PHPUnit stores data between TS runs
    }
}
