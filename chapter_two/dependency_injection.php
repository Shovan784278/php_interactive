<?php

    class Driver {

        protected Vehical $vehicle; 

        //This is called constructor injection

        public function __construct(Vehical $vehicle) { 
           
            $this->vehicle = $vehicle;

        }

        public function startDrivers() {

            $this->vehicle->startDrivers();

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

    $engine = new Engine();
    $vehical = new Vehical($engine);
    $driver = new Driver($vehicle);


    
    
    



?>