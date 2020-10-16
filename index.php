<?php
require __DIR__."/Pet.php";
require __DIR__."/Order.php";

session_start();


// print_r($_SESSION['orders']);

if(isset($_POST['sell'])){
    if(isset( $_SESSION['orders'][$_POST['category']][$_POST['name']])){
        $_SESSION['petshop'][$_POST['category']][$_POST['name']]->status=2;
        $_SESSION['orders'][$_POST['category']][$_POST['name']]->status=1;
        // print_r($_SESSION['orders'][$_POST['category']][$_POST['name']]);
        // die;
   }else{
        $_SESSION['petshop'][$_POST['category']][$_POST['name']]->status=1;
        $_SESSION['totalLoss']-=$_SESSION['petshop'][$_POST['category']][$_POST['name']]->price;
        
   }
  
}

if(isset($_GET['feedc'])){
    $_SESSION['petshop'][$_GET['feedc']][$_GET['feedn']]->lastFed = time();
    $_SESSION['totalLoss']-=3;
    header("Location: index.php");
}
if(rand(0,5)==1){
    switch (rand(0,3)) {
        case 0:
            new Pet("house pet","dog");
            break;
        case 1:
            new Pet("reptile","snake");
            break;
        case 2:
            new Pet('fish','goldfish');
            break;
        case 3:
            new Pet('bird','parrot'); 
            break;
    }

}
// new Pet("house pet","dog");
// new Pet("house pet","dog");
// new Pet("reptile","snake");
// new Pet("reptile","turtle");


if(isset($_POST['refresh'])){
    session_destroy();
    session_start();
    
include 'sessionInfo.php';
    new Pet("house pet","dog");
    new Pet("reptile","snake");
}
// new Pet("house pet","dog");
// new Pet("house pet","dog");
// new Pet("reptile","snake");
// new Pet("reptile","turtle");
// print_r($_SESSION['petshop']['house pet']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include 'body.php'?>
</body>
<script> //reloadas
        $(document).ready(function(){
        setInterval(function(){
            $("#infoLine").load('infoLine.php' );
            $("header").load('header.php' );
        }, 800);
        });
    </script>
</html>



























<?php
function consoleLog($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>