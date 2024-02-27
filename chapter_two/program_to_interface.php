<?php


    //This is called Program to interface not to an implementation. That means this is called Programe to an Interface

    class Driver {

        protected VehicalInterface $vehical; 

        //This is called constructor injection

        public function __construct(VehicalInterface $vehical) { 
           
            $this->vehical = $vehical;

        }

        public function startRide() {

            $this->vehical->start();

        }

        
    }


    //This is loosly coupled code. Now I can use any vehical class and create object for that.

    // class Vehical {

    //     public function start() {
    //         printf("");
    //     }

    // }

    //Now I can use abstract class as well. We can use abstract class because this Vehical class has no behavior. This would work for same as earlier class vehical. 

    // abstract class Vehical {

    //     abstract public function start();
    // }

    // Now If we work with behaviors of a abstract c;ass then we could use interface methods instead of abstract methods

    interface VehicalInterface {

        public function start();
    }


    //If we use interfaces then we will use implements intsted of extends 

    // class Bike extends Vehical{

    //     public function start() {
    //         printf("Bike started\n");
    //     }
    // }


    class Bike implements VehicalInterface {

        public function start() {

            printf("Bike started\n");
        
        }
    
    }


    class Car implements VehicalInterface {

        public function start() {

            printf("Car started\n");
        
        }
    }

    class Boat implements VehicalInterface {

        public function start() {

            printf("Boat started\n");
        
        }
    }



    //Here I created objects and passing the constructor with loosly coupled parameters 

    $bike = new Bike();
    $boat = new Boat();
    $car = new Car();
    $driver = new Driver($boat);
    $driver->startRide();


    
    
    



?>