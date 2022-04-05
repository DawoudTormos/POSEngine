<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function potato(Request $var){
        
        //variables
        $method = $var->method();
       


        return view('products-get',[
                                         'request' =>$var,
                                         'method'=> $method,
                                         
                                                               ]);
    }


    public function tomato(Request $req){


        $dollarRate = DB::table('global_variables')->where('name' , 'dollarRate')->value('value');
        if($dollarRate== null) {$dollarRate=0;}

        $globalProfit = DB::table('global_variables')->where('name' , 'defaultProfit')->value('value');
        if($globalProfit == null){$globalProfit = 0;};

        return view('products-post',[ 'request' =>$req,'dollarRate'=>$dollarRate,"globalProfit"=>$globalProfit]);
                                       
                                  
                                                               
    }

  
   
   
   
   
    /* public function tomato_result(Request $req){
        $method = $req->method();
        return view('products-post-result',[
                                        'request' =>$req,
                                        'method'=> $method
                                                                ]);
    }*/

    public function tomato2(Request $req){
        

        return view('products-post2',[ 'request' =>$req,]);
                                       
                                  
                                                               
    }

    public function tomato3(Request $req){
        

        return view('addProduct',[ 'request' =>$req,]);
                                       
                                  
                                                               
    }

   

    public function addProduct_post(Request $request){
        
        $DB = mysqli_connect( 'localhost' , 'root', '' , 'project1' )or die("cannot connect");
        $dollarRate = DB::table('global_variables')->where('name' , 'dollarRate')->value('value');
        
        if($dollarRate == null){$dollarRate = 0;};

        $hasProfit= $request->has('profit');

        $productName =  $request->input('productName');                             
        
        return view('php-scripts/addProduct-post',[ 'request' =>$request,
                                                    'DB'=>$DB,
                                                    'dollarRate'=>$dollarRate,
                                                    'hasProfit' =>$hasProfit,
                                                    'productName' =>$productName
                                                ]);
        

                          
                                                               
    }

    public function test(Request $request){
        
        $dollarRate = DB::table('global_variables')->where('name' , 'dollarRate')->value('value');
         
        //echo $req->collect();
        //echo "hello world.Success! this is bveing sent by the api.";
        if ($request->isMethod('get')) {
           // echo '\n Barcode:'.$request->input('barcode');
           exit();
        }
            $x= DB::table('products')->where('baracode',$request->input('barcode') )
                                 ->get();

        

            $response = '{"id":"133","barcode":"'.$request->input('barcode').'"}';
            if ($request->input('barcode') == "6223000260005"){
                $response = '{"id":"سمنة روابي","barcode":"'.$request->input('barcode').'"}';
            }
            if ($request->input('barcode') == "6218710320392"){
                $response = '{"id":"Rollana","barcode":"'.$request->input('barcode').'"}';
            }
            if($x->count() == 0){
                echo "Not Found!";
            }else if ($x->count() == 1){
                foreach($x as $result){
                    if ($result->currency_base == "dollar"){
                        $price = $result->unit_price * $dollarRate;
                    }else if($result->currency_base == "lira"){
                        $price = $result->unit_price;
                    }
                   echo '{"id":"'.$result->product_name.'","barcode":"'.number_format($price).'"}';
                }
            }
        



    }




    public function ChangeDollar(Request $req){
        
        $DB = mysqli_connect( 'localhost' , 'root', '' , 'project1' )or die("cannot connect");
        $dollarRate = DB::table('global_variables')->where('name' , 'dollarRate')->value('value');
        $defaultProfit = DB::table('global_variables')->where('name' , 'defaultProfit')->value('value');

        if($dollarRate == null){$dollarRate = 0;};

        $count = DB::table('products')->count();
        return view('change-dollar',[ 'request' =>$req,
                                      'DB'=>$DB,
                                      'dollarRate'=>$dollarRate ,
                                      'defaultProfit'=>$defaultProfit,
                                      'count'=>$count]);
                                       
                                  
                                                               
    }
  /*  public function ChangeDollar_post(Request $req){

    }
    // moved to ajax controller
   */
    public function changePrice(Request $req){
        $dollarRate = DB::table('global_variables')->where('name' , 'dollarRate')->value('value');
        if($dollarRate == null){$dollarRate = 0;};
        $globalProfit = DB::table('global_variables')->where('name' , 'defaultProfit')->value('value');
        if($globalProfit == null){$globalProfit = 0;};
        return view('changePrice',["dollarRate"=>$dollarRate ,
                                   "globalProfit" => $globalProfit ]);
    }


    public function editProductInfo(Request $req){
        $dollarRate = DB::table('global_variables')->where('name' , 'dollarRate')->value('value');
        if($dollarRate == null){$dollarRate = 0;};
        return view('browseAndEdit/editProductInfo',[ 'request' =>$req,'dollarRate' => $dollarRate]);
           
        
    }


    
    public function addCategoriesBrands(){
        
       $categories = DB::table('categories')->get('name');
       $brands = DB::table('brands')->get('name');
        $catsArray = [];
        $brandsArray = [];

        foreach( $categories as $cat ){
            array_push($catsArray, $cat->name);
              
        } 
        foreach( $brands as $brand ){
            array_push($brandsArray, $brand->name);
              
        } 
        echo json_encode($catsArray);
        echo "<br>";
        echo json_encode($brandsArray);

        return view('addCategoriesBrands',[ ]);
                                  
                                  
                                                               
    }

    
    

}
