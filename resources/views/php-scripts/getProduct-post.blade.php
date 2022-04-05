@php

class Product {
public $baracode ; 
public $productName;
public $unitPrice ;
public $currencyBase ;
public $size ;
public $profitType;
public $profitPercent;
public $categoryId;
public $brandId;
public $currentDollarRate;
public $groupBool;
public $groupBaracodes;
};
$baracode = $request->input('baracode');


 $sql_get_product= " SELECT * FROM `products` WHERE baracode= $baracode OR baracode= '$baracode'";
 $query1=mysqli_query($DB,$sql_get_product);
 $count= mysqli_num_rows($query1);
 $result= $query1->fetch_array(MYSQLI_ASSOC);

 


 $sql_get_product2= " SELECT * FROM `products` WHERE FIND_IN_SET($baracode, group_baracodes) or FIND_IN_SET('$baracode', group_baracodes)";
 $query2=mysqli_query($DB,$sql_get_product2);
 $count2= mysqli_num_rows($query2);
 $result2= $query2->fetch_array(MYSQLI_ASSOC);



if($count >= 1 and $count2 >= 1){
    
$array = new Product();
$array->baracode = $result["baracode"] ;
$array->productName = "<p class='border border-danger border-3 m-0 '>This product is found ".($count + $count2)." times</p>" ;
$array->unitPrice = 'conflict';
$array->id = 'conflict'.$result["baracode"];
//     var_dump($array);


$tojson = json_encode($array);
        echo $tojson;
        exit();
}else if ($count == 0 and $count2 == 0){
        $string = "Not Found";
        echo $string;
        exit();
}




 if ($count==1){

  
 $array = new Product();
  $array->id = $result["id"];
 $array->baracode = $result["baracode"] ;
 $array->productName = $result["product_name"] ;
 $array->unitPrice = $result["unit_price"];
 $array->currencyBase = $result["currency_base"];
 $array->size = $result["size"];
 $array->profitType = $result["profit_type"];
 $array->profitPercent = $result["profit_percentage"];
 $array->categoryId = $result["category_id"];
 $array->brandId = $result["brand_id"];
 if($result["currency_base"] == "lira"){
      //$array->unitPrice =  (int)$array->unitPrice
 }
 $array->groupBool = $result["group_bool"];
 $array->groupBaracodes = $result["group_baracodes"];
 
 $array->currentDollarRate = $dollarRate;
 
//     var_dump($array);

} else if ($count > 1){

 
$array = new Product();
$array->baracode = $result["baracode"] ;
$array->productName = "<p class='border border-danger border-3 m-0 '>This product is found ".$count." times</p>" ;
$array->unitPrice = 'conflict';
$array->id = 'conflict'.$result["baracode"];
//     var_dump($array);

}else if ($count==0){
  
    if($count2 == 1){
        

 $array = new Product();
  $array->id = $result2["id"];
 $array->baracode = 'group of barcodes';
 $array->productName = $result2["product_name"] ;
 $array->unitPrice = $result2["unit_price"];
 $array->currencyBase = $result2["currency_base"];
 $array->size = $result2["size"];
 $array->profitType = $result2["profit_type"];
 $array->profitPercent = $result2["profit_percentage"];
 $array->categoryId = $result2["category_id"];
 $array->brandId = $result2["brand_id"];
 
 $array->groupBool = $result2["group_bool"];
 $array->groupBaracodes = $result2["group_baracodes"];
 
 $array->currentDollarRate = $dollarRate;

    }else if($count2 > 1){
            $array = new Product();

$array->productName = "<p class='border border-danger border-3 m-0 '>This product is found ".$count2." times</p>" ;
$array->unitPrice = 'conflict';
$array->id = 'conflict';
if($result2["group_bool"] == 1){
$array->baracode = 'Group';

}else{
    $array->baracode = $result2["baracode"] ;
}

//     var_dump($array);

    }else{
        $string = "Not Found";
    }
    
}

//  

if ($count > 0 or $count2 > 0){
$tojson = json_encode($array);
        echo $tojson;
}else {
             echo $string;
}
@endphp