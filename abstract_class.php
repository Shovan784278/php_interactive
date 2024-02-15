<?php

    abstract class Vehicle {

        abstract public function getFair();

        abstract public function getPerKilo();

        public function getTotal(int $kilo){

            return $this->getFair() + ($kilo * $this->getPerKilo());

        }

    }

    class bike extends Vehicle {

        public function getFair(){
            return 20;
        }

        public function getPerKilo(){
            return 50;
        }

    }

    abstract class car extends Vehicle {

        public function getFair(){
            return 30;
        }

        public function getPerKilo(){
            return 10;
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
    
    $bike = new bike();
    $total =  $bike->getTotal(5);

    var_dump($total);
?>