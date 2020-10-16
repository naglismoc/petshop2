   
  
  
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
               }
               echo'</table>
               </div>';
       }

       function genPetRow($pet){
            $color = getColor($pet);
            $petBar ='<a href="?feedc='.$pet->category.'&feedn='.$pet->name.'" ><div class="bar" style="background-color:rgb('.$color['color'].')"></div></a>';
            echo
                '<tr '.$color['hidden'].'>
                    <td>'.$pet->name.'</td>
                    <td>Sell</td>
                    <td>'.$petBar.'</td>
                </tr>
            ';
       }
       function getColor($pet){
            $red = 0;
            $green = 255;
            $blue = 0;
            $const = 510;
            $times = (time()-$pet->lastFed)/$pet->lasts;
            $hidden = "";
            $add = $times * $const;
            if($times<=1){
                if($add<=255){
                    $red=(int)$add;
                }
                if($add>255 && $add<=510){
                    $red=255;
                    $green = (int)510-$add;
                }
            }else{
                $red=255;
                $green=255;
                $blue=255;
                $hidden = ' class=byeBye';
                $pet->status=1;
            }




            return ['color'=>$red.','.$green.','.$blue,'hidden'=>$hidden];
       }
   ?>
   </div>