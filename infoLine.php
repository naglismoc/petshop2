<?php
 if(!isset($_SESSION)){    
    require __DIR__."/Pet.php";
    require __DIR__."/Order.php";
    session_start();
}
if(!isset($_SESSION['orders'])){
    $_SESSION['orders']=[];
}
// print_r(count($_SESSION['orders']));
// consoleLog(Order::activeOrdersCount($_SESSION['orders']));

if(Order::activeOrdersCount($_SESSION['orders']) < 2 ){
new Order(10);
}

// print_r($_SESSION['orders']);
foreach ($_SESSION['orders'] as $key => $category) {
    foreach ($category as $key => $order) {
        $order->display();
    }
}

// function consoleLog($data) {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output);

//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
// }
   
?>