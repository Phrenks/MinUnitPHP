<?php
/* 
 * minunit_example.php
 * Inspired by http://www.jera.com/techinfo/jtns/jtn002.html
 * Made for PHP by Francisco José Marín Pino (Phrenks)
 * phrenks@gmail.com
 */

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

mu_reset();
$result = run_all_tests();
echo 'ALL TESTS PASSED<br/>';

?>