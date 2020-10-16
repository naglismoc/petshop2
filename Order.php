<?php

class Order{

    public $start;
    public $end;
    public $category;
    public $species;
    public $name;


    public function __construct($last){
        $this->start = time()+rand(0,10);
        $this->end = $this->start+$last;
        $this->createOrder();
        $_SESSION['orders'][$this->category][$this->name] = $this;
    }

    public function createOrder(){
        $category = array_rand($_SESSION['petshop']);
        $this->category = $category;
        $name = array_rand($_SESSION['petshop'][$category]);
        $this->name = $name;
        $this->species = $_SESSION['petshop'][$category][$name]->species;
    }
}
?>