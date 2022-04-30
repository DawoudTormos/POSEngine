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


    
    public function addCategoriesBrands(Request $req){
        
       $categories = DB::table('categories')->orderBy('name', 'asc')->get(['name','category_id']);
       $brands = DB::table('brands')->orderBy('name', 'asc')->get(['name','id']);
        $catIDs = [];
        $catNames = [];
        $catCounts = [];

        
        $brandIDs = [];
        $brandNames = [];
        $brandCounts = [];


        foreach( $categories as $cat ){

            array_push($catIDs, $cat->category_id);
            array_push($catNames, $cat->name);
            array_push($catCounts, DB::table('products')->where('category_id', $cat->category_id)->count());


              
        } 

        foreach( $brands as $brand ){
            array_push($brandIDs, $brand->id);
            array_push($brandNames, $brand->name);
            array_push($brandCounts, DB::table('products')->where('brand_id', $brand->id)->count());

              
        } 

        if($req->isMethod('post')){
            $array =  [$catNames , $catIDs , $catCounts , $brandNames , $brandIDs , $brandCounts];
            

            return response()->json(json_encode($array));
        }

        echo "<script>var catNames=".json_encode($catNames).";"
        ."var catIDs=".json_encode($catIDs).";"
        ."var catCounts=".json_encode($catCounts).";"
        ."var brandIDs=".json_encode($brandIDs).";"
        ."var brandNames=".json_encode($brandNames).";"
        ."var brandCounts=".json_encode($brandCounts).";"

        ."</script>";

        //echo "<br>";
        

        return view('addCategoriesBrands/addCategoriesBrands',[ ]);
                                  
                                  
                                                               
    }

    public function viewAll(){
        $allProducts = DB::table('products')->get();
        $assocArrayAllProducts = [];
        
        foreach($allProducts as  $product){
            $currentProduct=[];
            $currentProduct += [$product->product_name,
                            $product->baracode,
                            $product->unit_price,
                            $product->currency_base,
                            $product->profit_percentage,
                            $product->profit_type,
                            $product->size,
                            $product->category_id,
                            $product->brand_id,
                            $product->group_bool,
                            $product->group_baracodes,
                            $product->added_at
                            ];
            $assocArrayAllProducts += [$product->id => $currentProduct];
            
            }

        //echo "<br><br> ----------<br><br>";

        return view('viewAllProducts')->with('allProducts', json_encode($assocArrayAllProducts));

    }
    

}
