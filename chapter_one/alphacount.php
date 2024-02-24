<?php

    $user_input = (string) readline("Enter your string : ");

    $count = strlen(preg_replace('/[^a-zA-Z]/','', $user_input)); // Here preg_replace have three parameter and 1st paremeter name "pattern" which checks without a-zA-Z if any character or symble have then it will remove from the string. replacements by '' . And strlen checks length of the string. 

    echo $count;
