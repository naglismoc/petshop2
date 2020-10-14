<?php
require __DIR__."/Pet.php";
session_start();

// if(isset($_POST['refresh'])){
//     session_destroy();
//     session_start();
// }
include 'sessionInfo.php';
// new Pet("house pet","dog");
// new Pet("house pet","dog");
// new Pet("house pet","dog");
// new Pet("reptile","snake");
// new Pet("reptile","turtle");
// new Pet("savanoriai","snake");
// new Pet("savanoriai","turtle");
// print_r($_SESSION['petshop']['house pet']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    
    <header>
        <form action="" method="post">
            <button type="submit" name="refresh">refresh</button>
        </form>
    </header>
    <main>
    <?php
    include 'generateTables.php';
    ?>
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