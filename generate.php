<?php

require_once('vendor/autoload.php');

$output_file        = 'output.json';
$number_of_entries  = 10000;

$faker = \Faker\Factory::create();

$data = [];

for ($i = 0; $i < $number_of_entries; $i++) {
    $data[] = [
        'name'      => $faker->name,
        'address'   => $faker->address,
    ];
}

$json_data = json_encode($data);

$handle = fopen($output_file, 'w') or die(sprintf('Cannot open file: `%s`', $number_of_entries));
fwrite($handle, $json_data);
fclose($handle);

echo sprintf('Generated %d entries to the file %s successfully.%s', $number_of_entries, $output_file, PHP_EOL);
