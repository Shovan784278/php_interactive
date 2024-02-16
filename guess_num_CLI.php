<?php

// Here I took a random number slelection from rand() and give a loop when $user_input give a number, then loop randomly check what is the exact number 

    $number = rand(1, 100);

  while(true) {

    $user_input = (int) readline("Enter a number : "); //readline() is taking number from user

    if($user_input > $number) {

        printf("Try a lower number : \n");

    } elseif ($user_input < $number) {

        printf("Try a higher number : \n");

    } else {

        printf("Congrats! You guessed right number ");
    }

  } 
   


?>