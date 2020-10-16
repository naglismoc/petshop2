   
  
  
  <div id='container'>   
   <?php
   
    if(!isset($_SESSION)){    
        require __DIR__."/Pet.php";
        session_start();
    }
    $count=0;
    $size="calc(50% - 8px)";
       foreach ($_SESSION['petshop'] as $key => $category) {
           $count++;
           if(count($_SESSION['petshop'])==$count && $count%2!=0){
               $size="100%";
           }
           echo '<div class="cateogory" style="width:'.$size.'">
                   <h3>'.$key.'</h3>';
               echo'<table>
                       <tr>
                           <th>Name</th>
                           <th>Sell</th>
                           <th>Hungry</th>
                       </tr>';
               foreach ($category as $key => $pet) {
                   if($pet->status!=0){
                       continue;
                   }
                  genPetRow($pet);


                ?>

    <script>
        data = <?=petInfoJSON($pet)?>;
        console.log(data);
        loadBar();
        var i = 0;
        function loadBar() {
        if (i == 0) {
            let elem = document.getElementById(data[2]);
            // var width = 1;
            let t = new Date().getTime()/1000;
            let tL = data[0]+data[1]-t;
            let id = setInterval(frame, tL*2);//apgalvoti
            let add = Math.round(510*(t-data[0])/data[1]);
            let red = add;
            function frame() {
            if(red<=255){
                red++;
                elem.style.backgroundColor ="rgb("+red+",255,0)";
            }
            if(red > 255 && red <=510){
                red++;
                green=510-red;
                elem.style.backgroundColor ="rgb(255,"+green+",0)";
            }
            if(red > 510){
                clearInterval(id);
                elem.style.backgroundColor ="rgb(255,255,255)";
                elem.parentElement.parentElement.parentElement.classList.add("byeBye");
            }
               
                
                // if($times<=1){
    //             if($add<=255){
    //                 $red=(int)$add;
    //             }
    //             if($add>255 && $add<=510){
    //                 $red=255;
    //                 $green = (int)510-$add;
    //             }
    //         }else{
    //             $red=255;
    //             $green=255;
    //             $blue=255;
    //             $hidden = ' class=byeBye';
    //             $pet->status=1;
    //         }
            }
        }
        }
    </script>


              <?php }
               echo'</table>
               </div>';
       }

       function genPetRow($pet){
            // $color = getColor($pet);
            // $petBar ='<a href="?feedc='.$pet->category.'&feedn='.$pet->name.'" ><div class="bar" style="background-color:rgb('.$color['color'].')"></div></a>';
            $petBar ='<a href="?feedc='.$pet->category.'&feedn='.$pet->name.'" ><div class="bar" id="'.$pet->category.','.$pet->name.'" style="background-color:rgb(0,255,0)"></div></a>';
            echo
                // '<tr '.$color['hidden'].'>
                '<tr>
                    <td>'.$pet->name.'</td><td>';?>

                   <form class="sell" action="" method="post">
                    <input type="hidden" name="category" value="<?=$pet->category?>">
                    <input type="hidden" name="name" value="<?=$pet->name?>">
                   <button type="submit" name="sell">sell</button>
                   </form>

                   <?php echo' </td> <td>'.$petBar.'</td>
                </tr>
            ';
       }
    //    function getColor($pet){
    //         $red = 0;
    //         $green = 255;
    //         $blue = 0;
    //         $const = 510;
    //         $times = (time()-$pet->lastFed)/$pet->lasts;
    //         $hidden = "";
    //         $add = $times * $const;
    //         if($times<=1){
    //             if($add<=255){
    //                 $red=(int)$add;
    //             }
    //             if($add>255 && $add<=510){
    //                 $red=255;
    //                 $green = (int)510-$add;
    //             }
    //         }else{
    //             $red=255;
    //             $green=255;
    //             $blue=255;
    //             $hidden = ' class=byeBye';
    //             $pet->status=1;
    //         }




    //         return ['color'=>$red.','.$green.','.$blue,'hidden'=>$hidden];
    //    }

    function petInfoJSON($pet){
        return json_encode([$pet->lastFed,$pet->lasts,$pet->category.','.$pet->name]);

    }
   ?>
   </div>