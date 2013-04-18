<?php
global $tests_run;
$tests_run = 0;

include 'minunit.php';

function run_good_test(){
  mu_assert("This will not be shown because it's true", 1==1);
}

function run_bad_test(){
  mu_assert("This will be shown because it's false", 1==0);
}

function run_second_bad_test(){
  mu_assert("This will not be shown because even though it's false ".
		 "the previous assert made it stop.", 1==0);
}

function run_all_tests(){
  mu_run_test("run_good_test");
  mu_run_test("run_bad_test");
  mu_run_test("run_second_bad_test");
  return 0;
}

$result = run_all_tests();
echo 'ALL TESTS PASSED<br/>';

?>