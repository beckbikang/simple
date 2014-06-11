<?php
namespace  test;
use beck\space1\Beck;
use beck\space2\Tom;
include "TestNamespace.php";

$b1 = new Beck();
$b1->hello();
$t1 = new Tom();
$t1->hello();
var_dump(__NAMESPACE__);

