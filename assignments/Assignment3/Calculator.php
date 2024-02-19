<?php
class Calculator {
    public function calc($operator, $num1 = null, $num2 = null) {
      $num1 = (float)$num1;
      $num2 = (float)$num2;

      if ($operator === null || $num1 === null || $num2 === null) {
            return "Cannot perform operation. You must have three arguments. A string for the operator (+,-,*,/) and two integers or floats for the numbers.<br>";
        }

        switch ($operator) {
            case '+':
                return "The calculation is $num1 + $num2. The answer is " . ($num1 + $num2) . ".<br>";
            case '-':
                return "The calculation is $num1 - $num2. The answer is " . ($num1 - $num2) . ".<br>";
            case '*':
                return "The calculation is $num1 * $num2. The answer is " . ($num1 * $num2) . ".<br>";
            case '/':
               
               if ($num2 == 0) {
                    return "The calculation is $num1 / $num2. The answer is cannot divide a number by zero.<br>";
                }
                return "The calculation is $num1 / $num2. The answer is " . ($num1 / $num2) . ".<br>";
            
                default:
                return "Error: Invalid operator. Use +, -, *, or /.<br>";
        }
    }
}
