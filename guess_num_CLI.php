<?php

    $number = rand(1, 100);

  while(true) {

    $user_input = (int) readline("Enter a number : ");

    if($user_input > $number) {

        printf("Try a lower number : \n");
        
    } elseif ($user_input < $number) {

        printf("Try a higher number : \n");

    } else {

        printf("Congrats! You guessed right number ");
    }

  } 
   


?>