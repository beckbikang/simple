<?php
$coverage = new PHP_CodeCoverage;
$coverage->setData(array (
));
$coverage->setTests(array (
));

$filter = $coverage->filter();
$filter->setBlacklistedFiles(array (
  'D:\\workspace\\php_summary\\php\\phpunit\\ErrorTest.php' => true,
  0 => true,
  'C:\\wamp64\\bin\\php\\php5.4.12\\phpunit' => true,
));
$filter->setWhitelistedFiles(array (
));

return $coverage;