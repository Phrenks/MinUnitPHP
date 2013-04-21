<?php
/* 
 * minunit_class_example.php
 * Inspired by http://www.jera.com/techinfo/jtns/jtn002.html
 * Made for PHP by Francisco José Marín Pino (Phrenks)
 * phrenks@gmail.com
 */

require_once("minunit.php");

class Class_tests {

  public function is_true_true(){
    mu_assert("True is not true!", true == true);
    return 0;
  }

  public function is_one_plus_one_two(){
    mu_assert("One plus one is not two", (1+1)==2);
    return 0;
  }

  public function is_global_var_true(){
    global $last_test;
    mu_assert("\$last_test variable is not true", $last_test == true);
    return 0;
  }

  public function run_tests(){
    mu_reset();
    mu_run_test("is_true_true", $this);
    mu_run_test("is_one_plus_one_two", $this);
    mu_run_test("is_global_var_true", $this);

    return 0;
  }
}

//Global var that will cause the third test to fail
//Change to true to have all tests passed
global $last_test;
$last_test = false;

//Make an instance of the testing class
$test = new Class_tests;
$result = $test->run_tests();
echo 'ALL TESTS OK<br/>';


?>