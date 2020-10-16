<?php

class Order{

    public $start;
    public $end;
    public $category;
    public $species;
    public $name;
    public $status;


    public function __construct($last){
        //patikrinti: ar yra gyvunu. else quit/brake/destroy/set-on-fire
        $this->start = time()+rand(0,10);
        $this->end = $this->start+$last;
        $this->createOrder();
        $this->status=0;
        $_SESSION['orders'][$this->category][$this->name] = $this;
    }

    public function createOrder(){//patikrinti: ar yra gyvunu. ar sugeneruotas uzsakymas gyvam gyvunui
        $category = array_rand($_SESSION['petshop']);
        $name = array_rand($_SESSION['petshop'][$category]);
        $this->species = $_SESSION['petshop'][$category][$name]->species;
        if(!isset($_SESSION['order'][$this->catategory][$this->name]) ||
        $_SESSION['order'][$this->catategory][$this->name]->status != 0 ){
            $this->category = $category;
            $this->name = $name;
        }
   
        
    }

    public function display(){
        if($this->end <= time()){
            $this->status=1;
        }
        // print_r($this);
        if($this->start <=time() && $this->status==0){
        echo '"id like to buy '.$this->category.' '.$this->name.'"<br>';
        }
    }
    public function activeOrdersCount($orders){
        $count=0;
        foreach ($orders as $key => $category) {
            foreach ($category as $key => $order) {
               if($order->status==0){
                   $count++;
               }
            }
        }
        return $count;
    }
}
?>