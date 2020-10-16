<?php
class Pet{
    public $category;//
    public $species;//
    public $name;//
    public $lasts;//
    public $lastFed;//
    public $status;//
    public $price;//

    public function __construct($category,$species){
        $this->category = $category;
        $this->species = $species;
        $this->price = 10;
        $this->lastFed = time();
        $this->status = 0;//0 kai gyvas, 1 kai mires, 2 kai parduotas
        $this->lasts = $_SESSION['species'][$species];
        $tempName ="";
        do{
            $tempName = $_SESSION['names'][rand(0,count($_SESSION['names'])-1)];
        }while(isset($_SESSION['petshop'][$category][$tempName]));
        $this->name = $tempName;
        // print_r($_SESSION['petshop']['house pet']['Lidia']);
        $_SESSION['petshop'][$category][$this->name]=$this;

    }



}



?>