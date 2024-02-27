<?php


    //This is called Program to interface not to an implementation. That means this is called Programe to an Interface

    class Driver {

        protected Bike $bike; 

        //This is called constructor injection

        public function __construct(Bike $bike) { 
           
            $this->bike = $bike;

        }

        // public function startRide() {

        //     $this->vehicle->start();

        // } 

        public function startRide() {

            $this->bike->start();

        }
    }


    class bike {

        public function start() {
            printf("Bike started\n");
        }
    }


    class Vehical {

        protected Engine $engine;

        public function __construct(Engine $engine){

            $this->engine = $engine;
        }
    }

    class Engine {

        public Engine $engine;

        public function __construct() {


        }


    }


    //Here I created objects and passing the constructor with loosly coupled parameters 

    $bike = new bike();
    $driver = new Driver($bike);

    $driver->startRide();


    
    
    



?>