
<?php
if(!isset($_SESSION)){    
    require __DIR__."/Pet.php";
    require __DIR__."/Order.php";
    session_start();
}
$totalVal = 0;
$totalLoss = $_SESSION['totalLoss'];
$totalProffit = 0;

foreach ($_SESSION['petshop'] as $key => $category) {
    foreach ($category as $key => $pet) {
        if($pet->lasts+$pet->lastFed<time()){
            $pet->status=1;
            if(isset($_SESSION['orders'][$pet->category][$pet->name])){
                $_SESSION['orders'][$pet->category][$pet->name]->status=1;
            }
        }
        $totalVal+=$pet->price;
        if($pet->status==2){
            $totalProffit+=$pet->price;
        }
        
    }
}



?>
   <div id='stats'>
            <h2>Bendra gyvuneliu verte :<?=$totalVal?></h2>
            <h2>Nuostolis: <?=$totalLoss?></h2>
            <h2>Uzdarbis: <?=$totalProffit?></h2>
            <form action="" method="post">
                <button type="submit" name="refresh">refresh</button>
            </form>
        </div>