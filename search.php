<?php

require_once('vendor/autoload.php');

$column_name = 'name';
$search_terms = 'Meg';

$start_time = microtime(true);

$file_data = file_get_contents(__DIR__ . '/output.json');
$json_data = json_decode($file_data, true);

$search_regex = '/(' . strtolower($search_terms) . ')/';

$results = [];

foreach ($json_data as $key => $value) {
    if (preg_match($search_regex, strtolower($value[$column_name]))) {
        $results[] = $key;
    }
}

echo sprintf('found %d entries matching `%s`.%s', count($results), $search_terms, PHP_EOL);
echo sprintf('execution time: %g seconds.%s', (microtime(true) - $start_time), PHP_EOL);
