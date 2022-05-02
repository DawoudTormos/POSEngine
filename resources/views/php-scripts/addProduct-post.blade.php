<?php



echo '<head>    <link href="'. asset('css/FA.css') .'" rel="stylesheet"><link href="'.asset('css/error-productFound-StyleSheet.css').'" rel="stylesheet"></head>';
echo '<style> .btn-huge{padding:60px 60px;font-size:3rem !important}</style>';






$backButton = '<i onclick="window.history.go(-1)" class=" fixed-float-top-left fa-3x fas fa-arrow-alt-circle-left"></i>';



    $productName =$request->input('productName');
    $size =$request->input('size');
    $category_id =$request->input('category');
    $brand_id =$request->input('brand');
    $currency_base =$request->input('currency_base');
    $profit_type =$request->input('WholesaleFinal');
    $group_bool =$request->input('group-boolean');
    $group_baracodes =$request->input('group-baracodes');
    $unitPrice=0;


  
  $hasProfit= $request->has('profit');

if ($hasProfit){
		$profit_percent = $request->input('profit');
   // echo ($hasProfit)."<br>";
	}else{
			$profit_percent =0.0001;
	}





if($group_bool ==  "false" ){
  $group_bool = 0;
}else if($group_bool == "true" ) {
  $group_bool = 1;
}




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



if($request->has('baracode')){
  $baracode = $request->input('baracode');
}else{
$baracode = "";
}






if($currency_base == "dollar"){


///[^\d.]/
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
}else if($currency_base  == "lira"){
$unitPrice = $request->input('lira-lira');
  $unitPrice = floatval(preg_replace('/[^\d.]/', '', $unitPrice));
$unitPrice = round($unitPrice,0);
}




echo $group_baracodes."<br><br>";
//echo $query_productName_count;
/*


*/


/*
DB::table('products')
             ->insert([ 'id' => null,
             'product_name' => $productName,
              'baracode' => $baracode,
              'unit_price' => $unitPrice,
              'profit_percentage' => $profit_percent,
              'profit_type' => $profit_type,
              'size' => $size,
              'currency_base' => $currency_base ,
              'category_id' => $category_id,
              'brand_id' => $brand_id,
              'group_bool' => $group_bool,
              'group_baracodes' => $group_baracodes

             ]);
*/
   







// starting a fixed transparent div covering the whole screen
echo "<br><br><br><br><div class=''>"
     ."<br><br><br>" ;






$group_baracodes_CausingConflict_Array=[];
$x1 = 0;
$x11 = 0;
$x2 = 0;
$x22 = 0;

  if($group_bool == 0){

$query_productName = DB::table('products')->where('product_name',$productName)->get();
$query_productName_count = $query_productName->count();


$query_singleBaracode = DB::table('products')->where('baracode',$baracode)->get();
$query_singleBaracode_count = $query_singleBaracode->count();


$query_groupBaracodes = DB::table('products')->whereRaw("FIND_IN_SET('$baracode', group_baracodes)")->get();
$query_groupBaracodes_count = $query_groupBaracodes->count();

if($query_productName_count ==0 && $query_singleBaracode_count == 0 && $query_groupBaracodes_count ==0){
  
DB::table('products')
             ->insert([ 'id' => null,
             'product_name' => $productName,
              'baracode' => $baracode,
              'unit_price' => $unitPrice,
              'profit_percentage' => $profit_percent,
              'profit_type' => $profit_type,
              'size' => $size,
              'currency_base' => $currency_base ,
              'category_id' => $category_id,
              'brand_id' => $brand_id,
              'group_bool' => $group_bool,
              'group_baracodes' => $group_baracodes
 ]);
  echo "Product with single baracode added successfully<br><br>";


 echo'<script>document.head.insertAdjacentHTML(\'afterbegin\', \'<link href="'. asset('css/app.css') .'" rel="stylesheet">\')</script>';


   echo "<br>
<div class='row justify-content-center'><div class='col-4'>
 <form method='get' class='d-flex justify-content-center' action='"
 .route('AddProduct').
 "'>

 <input type='submit'  class='btn btn-outline-danger btn-lg btn-huge btn-block' value='Add New'>
 </form></div></div>";


}else{ 
  echo'<script>document.body.insertAdjacentHTML(\'afterbegin\', \'<div id="error"><div id="box"></div><h3> ERROR 550</h3><h2> The product already exists </h2><h2> المنتج تم ادخاله سابقا</h2> </div>\')</script>';

  
  echo $backButton;
  
  
  if($query_productName_count > 0){
  
    echo "<br><br><h3>Error!</h3><br>The Product Name For the group you ar adding is already in use with another group or product<br>";


}else if($query_singleBaracode_count > 0){
  
echo "<br><br><h3>Error!</h3><br>The single baracode for the product you are adding is already in use with ".$query_singleBaracode_count." another single product<br>";

}else if($query_groupBaracodes_count > 0){
echo "<br><br><h3>Error!</h3><br>The single baracode for the product you are adding is already in use with ".$query_groupBaracodes_count." another group product<br>";

}

echo "<br><br><br><br>Product Name:".$productName."<br><br>";
echo "Baracode:".$baracode."<br><br>";



}

}else if($group_bool == 1){


$group_baracodes_array = explode (",", $group_baracodes); 



$query_productName = DB::table('products')->where('product_name',$productName)->get();
$query_productName_count = $query_productName->count();

 foreach ($group_baracodes_array as $bar) {

$query_singleBaracode = DB::table('products')->where('baracode',$bar)->get();
$query_singleBaracode_count = $query_singleBaracode->count();


$query_groupBaracodes = DB::table('products')->whereRaw("FIND_IN_SET('$bar', group_baracodes)")->get();
$query_groupBaracodes_count = $query_groupBaracodes->count();

if($query_singleBaracode_count>0){
  array_push($group_baracodes_CausingConflict_Array,$bar);
  $x1++;
  $x11 += $query_singleBaracode_count;
  
}

if($query_groupBaracodes_count>0){
  array_push($group_baracodes_CausingConflict_Array,$bar);
  $x2++;
  $x22+=$query_groupBaracodes_count;
  
}

 }



 if($x1 == 0   &&   $x2 == 0   &&    $x22 == 0 && $query_productName_count ==0){
   DB::table('products')
             ->insert([ 'id' => null,
             'product_name' => $productName,
              'baracode' => $baracode,
              'unit_price' => $unitPrice,
              'profit_percentage' => $profit_percent,
              'profit_type' => $profit_type,
              'size' => $size,
              'currency_base' => $currency_base ,
              'category_id' => $category_id,
              'brand_id' => $brand_id,
              'group_bool' => $group_bool,
              'group_baracodes' => $group_baracodes
 ]);

 echo "Product with group of baracodes added successfully<br><br>";

 echo'<script>document.head.insertAdjacentHTML(\'afterbegin\', \'<link href="'. asset('css/app.css') .'" rel="stylesheet">\')</script>';


  echo "<br>
<div class='row justify-content-center'><div class='col-4'>
 <form method='get' class='d-flex justify-content-center' action='"
 .route('AddProduct').
 "'>

 <input type='submit'  class='btn btn-outline-danger btn-lg btn-huge btn-block' value='Add New'>
 </form></div></div>";


 }else{


 echo'<script>document.body.insertAdjacentHTML(\'afterbegin\', \'<div id="error"><div id="box"></div><h3> ERROR 550</h3><h2> The product already exists </h2><h2> المنتج تم ادخاله سابقا</h2> </div>\')</script>';


echo $backButton;

if($query_productName_count > 0){
  echo "<br><br><h3>Error!</h3><br>The Product Name for the group product you are adding is already in use with another group or product<br>";
}

////

if($x1 > 0){
  echo "<br><br><h3>Error!</h3><br>".$x1." of the group baracodes for the group product you are adding is already in use with ".$x11." another single product<br>";
}

//////

if($x2 > 0){
  echo "<br><br><h3>Error!</h3><br>".$x2." of the group baracodes for the group product you are adding is already in use with ".$x22." another group product<br>";
}

/////
echo "<br><br><br><br>Product Name:".$productName."<br><br>";


////

if($x2 > 0 || $x1 > 0){
 echo "The group baracode causing conflict are:";

foreach($group_baracodes_CausingConflict_Array as $bar){
  echo "<br>".$bar;
}
echo"<br><br>";
}

 }

}










echo "</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
//ending the fullscreen


?>