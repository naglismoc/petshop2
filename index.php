<?php
require __DIR__."/Pet.php";
require __DIR__."/Order.php";

session_start();


new Order(10);
new Order(10);
// print_r($_SESSION['orders']);

if(isset($_GET['feedc'])){
    $_SESSION['petshop'][$_GET['feedc']][$_GET['feedn']]->lastFed = time();
    header("Location: index.php");
    $_SESSION['food']-=3;
}
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
    
<?php
$totalVal = 0;
$totalLoss = $_SESSION['food'];
$totalProffit = 0;

foreach ($_SESSION['petshop'] as $key => $category) {
    foreach ($category as $key => $pet) {
        $totalVal+=$pet->price;
        if($pet->status==1){
            $totalLoss-=$pet->price;
        }
    }
}



?>

    <header>
        <div id='stats'>
            <h2>Bendra gyvuneliu verte :<?=$totalVal?></h2>
            <h2>Nuostolis: <?=$totalLoss?></h2>
            <h2>Uzdarbis: <?=$totalProffit?></h2>
            <form action="" method="post">
                <button type="submit" name="refresh">refresh</button>
            </form>
        </div>
    </header>
<div id="infoLine">
   <?php include 'infoLine.php'?>
</div>







    <main>
    <?php
    if(($totalVal+$totalProffit) < (-1*$totalLoss)){
        echo '<h1 style="text-align:center">GAME OVER</h1>';
        die;
    }
    include 'generateTables.php';
    ?>
    <script> //reloadas
        $(document).ready(function(){
        setInterval(function(){
            $("main").load('generateTables.php' );
        }, 800);
        });
    </script>
    </main>
   
    

    
</body>
</html>



























<?php
function consoleLog($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>