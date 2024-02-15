<?php

    abstract class Vehicle {

        abstract public function getFair();

        abstract public function getPerKilo();

        public function getTotal(int $kilo){

            return $this->getFair() + ($kilo * $this->getPerKilo());

        }

    }

    interface gethourelyRent {

        public function getHourelyRate();

    }

    class bike extends Vehicle {

        public function getFair(){
            return 20;
        }

        public function getPerKilo(){
            return 50;
        }

    }

    class car extends Vehicle implements gethourelyRent {

        public function getFair(){
            return 30;
        }

        public function getPerKilo(){
            return 10;
        }

        public function getHourelyRate(){

            return 100;
        }
    }

    abstract class CNG extends Vehicle {

        public function getFair(){
            return 50;
        }

        public function getPerKilo(){
            return 20;
        }
        
    }
    
    $car = new car();
    $total =  $car->getTotal(5);

    var_dump($total);
?>