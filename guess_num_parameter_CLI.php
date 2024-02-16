<?php

// Here I took a random number selelection from rand() and give a loop when $user_input give a number, then loop randomly check what is the exact number 

//Now here I can check if $user_input select minimum and maximum values for guessing.

//getopt have two parameter short options and long options. It takes input from user. It's a default function
$options = getopt("", ['min::', 'max::']); // In this line IF I set ['min:', 'max:'] Its means that this parameter is required and If I set ['min::', 'max::'] this means that Its now optional parameter. And If I set parameter then It would be give value by parameter otherwise it's take default value. One more thing that when I set value for min max then in CLI min should be --min = value and --max = value

  $min = (int) ($options['min'] ?? 1);// This line means If I don't set parameter then it set a default value 1
  $max = (int) ($options['max'] ?? 1);  // This line means If I don't set parameter then it set a default value 1

  //var_dump($min, $max);

  $number = rand(1, 100);

  while(true) {

    $user_input = (int) readline("Enter a number : "); //readline() is taking number from user and returns in string. But if we set type cast then it would RETURN INTEGER

    if($user_input > $number) {

        printf("Try a lower number : \n");

    } elseif ($user_input < $number) {

        printf("Try a higher number : \n");

    } else {

        printf("Congrats! You guessed right number ");
    }

  } 
   


?>