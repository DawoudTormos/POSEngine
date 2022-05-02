
@php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = trim($data);
  return $data;
}

$conflictFound = true;


echo '<head>  <link href="'.asset('css/app.css').'" rel="stylesheet">    <link href="'. asset('css/FA.css') .'" rel="stylesheet"><link href="'.asset('css/error-productFound-StyleSheet.css').'" rel="stylesheet"></head>';
echo '<style> .btn-huge{padding:48px 48px;font-size:2rem !important}</style>';
echo "post request: <br><br>";

$productName = test_input($request->input('productName'));
$size = test_input($request->input('size'));
$category_id = test_input($request->input('category'));
$brand_id = test_input($request->input('brand'));
$currency_base = test_input($request->input('currencyBase'));
$profit_type = test_input($request->input('WholesaleFinal'));
$group_bool = test_input($request->input('group-boolean'));
$group_baracodes = test_input($request->input('group-baracodes'));
$unitPrice=0;
$sql_add_product="";

if ($hasProfit){
		$profit_percent = $request->input('profit');
   // echo ($hasProfit)."<br>";
	}else{
			$profit_percent =0.0001;
	}


//echo $request->input('group-boolean')."<br>";
if($group_bool ==  "false"){
  $group_bool = 0;
}else if($group_bool == "true" ) {
  $group_bool = 1;
}
















//detrmining profit_percentage and profit_type
if($profit_type=="final"){
  $profit_type="special";
  $profit_percent=0.001;
}else if($profit_type=="wholesale"){
  $profit_type="special";
  $profit_percent=$profit_percent;
}else if($profit_type=="wholesaleDefault"){
  $profit_type="global";
  $profit_percent= NULL;
}

////////














// so that when you add a product with a group of baracodes it doesn't matter
if($request->has('baracode')){
  $baracode = test_input($request->input('baracode'));
}else{
$baracode = "";
}




/// this part determines currency_base andn price  nad determines the sql query
if($request->input('currency_base') == "dollar"){



if ($request->has('dollar-dollar')  and $request->input('dollar-dollar') != null) {
$unitPrice = $request->input('dollar-dollar');
$unitPrice = floatval(preg_replace('/[^\d.]/', '', $unitPrice));
$unitPrice = round($unitPrice,3);

}else if ($request->has('dollar-lira') and $request->input('dollar-lira') != null) {
    $unitPrice = $request->input('dollar-lira');
    $unitPrice = floatval(preg_replace('/[^\d.]/', '', $unitPrice));
    $unitPrice = $unitPrice / $dollarRate;
    $unitPrice = round($unitPrice,3);
    //
    
}

$sql_add_product = "INSERT INTO `products`(`id`, `product_name`, `baracode`, `unit_price`,`profit_percentage`,`profit_type`, `size`, `currency_base`,`category_id`,`brand_id` , `group_bool` , `group_baracodes`) VALUES ( null ,'$productName','$baracode','$unitPrice' , '$profit_percent' , '$profit_type' , '$size','dollar', '$category_id' , '$brand_id' ,'$group_bool' , '$group_baracodes')";

if($profit_percent==null){
$sql_add_product = "INSERT INTO `products`(`id`, `product_name`, `baracode`, `unit_price`,`profit_percentage`,`profit_type`, `size`, `currency_base`,`category_id`,`brand_id` , `group_bool` , `group_baracodes`) VALUES ( null ,'$productName','$baracode','$unitPrice' , null , '$profit_type' , '$size','dollar', '$category_id' , '$brand_id' ,'$group_bool' , '$group_baracodes')";

  
}




}else if ($request->input('currency_base') == "lira"){
$unitPrice = $request->input('lira-lira');
 $unitPrice = floatval(preg_replace('/[^\d.]/', '', $unitPrice));
$sql_add_product = "INSERT INTO `products`(`id`, `product_name`, `baracode`, `unit_price`,`profit_percentage`,`profit_type`, `size`, `currency_base`,`category_id`,`brand_id` , `group_bool` , `group_baracodes`) VALUES ( null ,'$productName','$baracode','$unitPrice' , '$profit_percent' , '$profit_type' , '$size','lira', '$category_id' , '$brand_id' ,'$group_bool' , '$group_baracodes')";

if($profit_percent==null){
$sql_add_product = "INSERT INTO `products`(`id`, `product_name`, `baracode`, `unit_price`,`profit_percentage`,`profit_type`, `size`, `currency_base`,`category_id`,`brand_id` , `group_bool` , `group_baracodes`) VALUES ( null ,'$productName','$baracode','$unitPrice' , null , '$profit_type' , '$size','lira', '$category_id' , '$brand_id' ,'$group_bool' , '$group_baracodes')";

  
}



}
//////////



$group_baracodes_array = explode (",", $group_baracodes); 


$cc1 = 0;
$cc2 = 0;
$cc1ex = 0 ;
$cc2ex = 0 ;
if($group_bool ==  1){

echo '<script src="';
 echo asset('js/Public_jquery.min.js');
 echo '"></script>';


$sql_get_similar_productName = "SELECT * FROM products WHERE product_name = '$productName'";
$result01 = mysqli_query( $DB , $sql_get_similar_productName);

echo "<div class='display-6' id='error2'></div><br>";
if(mysqli_num_rows($result01) > 0){
  echo "<br><br>The Product Name For the group you ar adding is already in use with another group or product<br>";
  echo "<script> $('#error2').html('Error'); </script>";
}

$group_baracodes_causingConflict  =[];//to be used
  foreach ($group_baracodes_array as $element) {
 $sql_get_similar_baracode = "SELECT * FROM products WHERE baracode= '$element' AND group_bool = 0";

$sql_get_similar_baracode_group = "SELECT * FROM products WHERE group_bool = 1 AND FIND_IN_SET('$element', group_baracodes)";



$result02 =mysqli_query( $DB , $sql_get_similar_baracode);
$result03 = mysqli_query( $DB , $sql_get_similar_baracode_group);






if(mysqli_num_rows($result02) > 0){
 $cc1++ ;// new group baracode having conflicts with existing single baracode
}
if(mysqli_num_rows($result03) > 0){
 $cc2++ ;// new group baracode having conflicts with existing group baracode
 $cc2ex += mysqli_num_rows($result03);//// existing single baracode having conflicts with new group baracode
}



}



if(mysqli_num_rows($result01) == 0 && mysqli_num_rows($result02) == 0 && mysqli_num_rows($result03) == 0){

$conflictFound = false;


//Execute the insert mysql query
mysqli_query($DB,$sql_add_product);

echo "Group Product Added Succecfully!";

echo $request->collect()."<br>";
 echo "Dollar-rate: ".$dollarRate."<br>unit-price:".$unitPrice."<br>";
 echo '<br><br><br><h2>This page is intentionally made to display the _POST object of the Post request</h2>';

 
  echo "<script>$('#hiddenInput').focus();</script>";
 echo "<br>
<div class='row justify-content-center'><div class='col-4'>
 <form method='get' class='d-flex justify-content-center' action='"
 .route('AddProduct').
 "'>

 <input type='submit'  class='btn btn-outline-danger btn-lg btn-huge btn-block' value='Add New'>
 </form></div></div>";
 
 echo "<br>".($profit_percent==null);
 echo "<br>";
}else{

  echo'   <div id="error">
  <div id="box"></div>
  <h3> ERROR 550</h3>
  <h2> The product already exists </h2>
  <h2> المنتج تم ادخاله سابقا</h2> </div>
    <i onclick="window.history.go(-2)" class=" fixed-float-top-left fa-3x fas fa-arrow-alt-circle-left"></i>';


}



if($cc1 != 0){

$cc1 = strval($cc1);
echo "<br>".$cc1." of the baracodes you entered is used for another single product(s)<br>";
echo "<script> $($('#error2').html('Error'))</script>";

}



if($cc2 != 0){
$cc2 = strval($cc2);
echo "<br>".$cc2." of the baracodes you entered are causing ".$cc2ex." conflicts with other group product(s)<br>";
echo "<script> $('#error2').html('Error'); </script>";
}





}else if($group_bool == 0 ) {
  













$sql_get_similar_baracode = "SELECT * FROM products WHERE baracode= '$baracode' AND group_bool = 0 ";
$sql_get_similar_productName = "SELECT * FROM products WHERE product_name = '$productName'";
$sql_get_similar_baracode_group = "SELECT * FROM products WHERE group_bool = 1 AND FIND_IN_SET('$baracode', group_baracodes)";



$result =mysqli_query( $DB , $sql_get_similar_baracode);
$result2 = mysqli_query( $DB , $sql_get_similar_productName);



// so that when you add a product with a group of baracodes it doesn't matter
if($request->has('baracode')){
  $similar_baracode_count = mysqli_num_rows($result);
}else{
$similar_baracode_count = 0;
}
///




if($similar_baracode_count == 0 and mysqli_num_rows($result2)==0 ){

  $conflictFound = false;


  mysqli_query($DB,$sql_add_product);
 echo $request->collect()."<br>";
 echo "Dollar-rate: ".$dollarRate."<br>".$unitPrice."<br>";
 echo '<script src="';
 echo asset('js/Public_jquery.min.js');
 echo '"></script><br><br><br><h2>This page is intentionally made to display the _POST object of the Post request</h2>';

 


  echo "<script>$('#hiddenInput').focus();</script>";
 echo "<br>
<div class='row justify-content-center'><div class='col-4'>
 <form method='get' class='d-flex justify-content-center' action='"
 .route('AddProduct').
 "'>

 <input type='submit'  class='btn btn-outline-danger btn-lg btn-huge btn-block' value='Add New'>
 </form></div></div>";
 echo "<br>".($profit_percent==null);
 echo "<br>";


 echo mysqli_error($DB);
}else if($similar_baracode_count !=0 and mysqli_num_rows($result2)!=0){
  echo '
    <h3>Adding a normal product.</h3>
    <h3>Both baracode and productName</h3>
  
';

}else if($similar_baracode_count !=0){
  echo '
  <h3>Adding a normal product.</h3>
    <h3>baracode</h3>
  
';
}else if(mysqli_num_rows($result2)!=0){
  echo '
  <h3>Adding a normal product.</h3>
     <h3>productName</h3>
';
}


}


if ($conflictFound == false){


 $product = DB::table('products')->where('product_name' , $productName)->get()  ;                              
           echo"<br><br><h2>SQL Select query after adding the row: <br><br>";print_r($product);echo"</h2>"      ;
    

    DB::table('products_history_log')
              ->insert(['id'=> $product[0]->id,
                        'product_name'=>$product[0]->product_name,
                        'baracode'=>$product[0]->baracode,
                        'unit_price' => $product[0]->unit_price,
                        'profit_percentage'=>$product[0]->profit_percentage,
                        'profit_type'=>$product[0]->profit_type,
                        'size'=>$product[0]->size,
                        'category_id'=>$product[0]->category_id,
                        'brand_id'=>$product[0]->brand_id,
                        'currency_base'=>$product[0]->currency_base,
                        'group_bool'=>$product[0]->group_bool,
                        'group_baracodes'=>$product[0]->group_baracodes,

            
            ]);

}
@endphp

 

