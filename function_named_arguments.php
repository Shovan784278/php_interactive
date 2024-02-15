<?php

    function listItems(float $price, int $quantity, float $discount)  {

        $total = $price * $quantity;
        $total -= $discount;
        return $total; 

    }

    //Without named arguments
    //echo listItems(50,2,0);

    //With named arguments
    echo listItems(price: 50,quantity: 2,discount: 2.5);

?>