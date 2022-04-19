@php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = trim($data);
  return $data;
}



$product = json_decode($req->input("productInfo") , true) ;

    $id = test_input($product['id']);

  $product_name = test_input($product["product_name"]);  
    $group_bool = test_input($product["group_bool"]);   
  $baracode = test_input($product["baracode"]);   
  $group_baracodes = test_input($product["group_baracodes"]); 


  



  $response=new stdClass();

$response->productNameConflict= False;
$response->message= "Checking the product with id \"$id\" and product name \"$product_name\" for duplicate info in the server.";
$response->singleBaracodeConflict = False;//problem with the single barcode
$response->groupBaracodesWithConflict=[];//problem with sum of the group_barcodes

// old products with barcodes also used in the new product info
$response->oldproductsCausingConflict=array(); // or =[];

//$response->age=27;






    $sql_get_similar_productName= " SELECT * FROM `products` WHERE product_name= '$product_name' and  id != $id";
 $query3=mysqli_query($DB,$sql_get_similar_productName);
 $count3= mysqli_num_rows($query3);

 while($result3 = $query3->fetch_array(MYSQLI_ASSOC)){
         if ($result3['id'] != $id){
             $count3++;
                   
        }
       
    }

 if ($count3 != 0){
     $response->productNameConflict= true;
 }











  if($group_bool == 0)  {




      $sql_get_product= " SELECT * FROM `products` WHERE baracode= '$baracode' ";
 $query1=mysqli_query($DB,$sql_get_product);
 $count= mysqli_num_rows($query1);
 

    while($result = $query1->fetch_array(MYSQLI_ASSOC)){
         if ($result['id'] != $id){
             array_push($response->oldproductsCausingConflict,$result);
             $response->singleBaracodeConflict = true;
                   
        }
       
    }





 $sql_get_product2= " SELECT * FROM `products` WHERE FIND_IN_SET('$baracode', group_baracodes) ";
 $query2=mysqli_query($DB,$sql_get_product2);
 $count2= mysqli_num_rows($query2);



 while($result2 = $query2->fetch_array(MYSQLI_ASSOC)){
         if ($result2['id'] != $id){
             array_push($response->oldproductsCausingConflict,$result2);
             $response->singleBaracodeConflict = true;
                   
        }
       
    }

 /*$result2= $query1->fetch_array(MYSQLI_ASSOC);

 if ($count != 0){
     $response->message= "$baracode caused conflict with $count other products";
     $response->singleBaracodeConflict = True;
 }*/




















  }else if ($group_bool == 1){


 $group_baracodes_array = explode (",", $group_baracodes); 

    foreach ($group_baracodes_array as $element){





        $sql_get_product= " SELECT * FROM `products` WHERE baracode= '$element'";
        $query1=mysqli_query($DB,$sql_get_product);
        $count= mysqli_num_rows($query1);
 

        while($result = $query1->fetch_array(MYSQLI_ASSOC)){
             if ($result['id'] != $id){
                 array_push($response->oldproductsCausingConflict,$result);

                if(in_array($element, $response->groupBaracodesWithConflict) == False){
                    array_push($response->groupBaracodesWithConflict,$element);
                }
                   
         }
       
     }








        $sql_get_product2= " SELECT * FROM `products` WHERE FIND_IN_SET('$element', group_baracodes)";
        $query2=mysqli_query($DB,$sql_get_product2);
        $count2= mysqli_num_rows($query2);

        while($result2= $query2->fetch_array(MYSQLI_ASSOC)){

              if ($result2['id'] != $id){
                  if(in_array($result2, $response->oldproductsCausingConflict) == False){
                 array_push($response->oldproductsCausingConflict,$result2);
                  }
                 if(in_array($element, $response->groupBaracodesWithConflict) == False){
                    array_push($response->groupBaracodesWithConflict,$element);
                }
                   
         }
       

        }



    }

  }
 






$responseJSON = json_encode($response);
echo $responseJSON;
//var_dump($baracodesList);
//var_dump($result2);

@endphp