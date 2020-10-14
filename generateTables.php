   
   <div id='container'>   
   <?php
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
                   echo'<tr>
                           <td>'.$pet->name.'</td>
                           <td>Sell</td>
                           <td><a href="#" ><div class="bar" style="background-color:rgb(0,255,0)"></div></a></td>
                       </tr>
                   ';
               }
               echo'</table>
               </div>';
       }
   ?>
   </div>