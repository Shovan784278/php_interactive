<?php 

    $years = [2002, 2005, 2007];

    function listYear($year){

        return $year += 10;

    }

    $updateYears =  array_map("listYear", $years);
    print_r($updateYears);


    //Implementing callback with anonymous function
    function greet($name, $customGreeting) {

        echo "Hello, $name!";
        
        $customGreeting();

    }

        //call the greeting with custom greeting
        greet("Shovan", function () {
        $time = date('h:i');

            echo "Have a good day! It's {$time}";
        });

    

?>