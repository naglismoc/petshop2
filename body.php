


<header>
    <?php include 'header.php'?>
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
    
</main>