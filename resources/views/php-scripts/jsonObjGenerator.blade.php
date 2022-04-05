@php
    

class Obj {
public $count ; 
public $dollarRate;


};

$Info = new Obj();
$Info->count = $count;
if(isset($dollarRate)){
   $Info->dollarRate = $dollarRate ; 
}
if(isset($defaultProfit)){
   $Info->defaultProfit = $defaultProfit ; 
}



$InfoJson = json_encode($Info);
echo $InfoJson ;
@endphp