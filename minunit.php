<?php
/* minunit.php
 * Inspired by http://www.jera.com/techinfo/jtns/jtn002.html
 * Made for PHP by Francisco José Marín (Phrenks)
 */

function mu_assert($message, $test){
  global $mu_exception;
  
  //If the condition is false, store the global exception
  if($test == false && $mu_exception == null)
    $mu_exception = $message;
} 

//Parameters:
//Name of the test function
//The class it belongs to, if there is one
function mu_run_test(){
  //Get the global variables
  global $mu_tests_run, $mu_exception;

  //Check the number of parameters is 1 or 2
  if(func_num_args() < 1 || func_num_args() > 2)
    throw new Exception("Incorrect number of parameters for mu_run_test");

  //If we have a class, run it from the class
  if(func_num_args() == 2) 
    call_user_func(array(func_get_arg(1), func_get_arg(0)));

  //Otherwise, just run the function
  else {
    $test = func_get_arg(0);
    $test();
  }

  //If one of the asserts failed, show the error and quit
  if($mu_exception){
    echo "Assert failed: ".$mu_exception."<br/>";
    echo $mu_tests_run." tests were run successfully.<br/>";
    exit();
  }

  //Otherwise, increase the number of test runs
  $mu_tests_run++;
}

//Reset the global variables
function mu_reset(){
  global $mu_exception, $mu_tests_run;
  $mu_exception = null;
  $mu_tests_run = 0;
}

?>