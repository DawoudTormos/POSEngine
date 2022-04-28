<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class AjaxController extends Controller
{
 

    public function getProduct_post(Request $request){
        
         $DB = mysqli_connect( 'localhost' , 'root', '' , 'project1' )or die("cannot connect");
         $dollarRate = DB::table('global_variables')->where('name' , 'dollarRate')->value('value');
             
         return view('php-scripts/getProduct-post',[ 'request' =>$request,"DB"=>$DB , "dollarRate" => $dollarRate ]);

    }//used for pos and changePrice pages

    public function getProduct_post_Unrestricted(Request $req){

        $baracode =  $req->input('baracode');

        if ($baracode == '' || $baracode == 0){
            echo "empty baracode sent!";
            exit;
        }
       $result = DB::table('products')
        ->whereRaw("baracode= '$baracode' || FIND_IN_SET('$baracode', group_baracodes)")
        ->get();

        return response()->json(json_encode($result));

    }

    public function consoleLog_post(Request $request){  
         $DB = mysqli_connect( 'localhost' , 'root', '' , 'project1' )or die("cannot connect");
 
        return view('php-scripts/consoleLog-post',[ 'request' =>$request,"DB"=>$DB]);
    }

    public function ChangeDollar_post(Request $req){
        
        $dollarRateX = $req->input('DollarRate');
        DB::table('global_variables')
              ->where('name', 'dollarRate')
              ->update(['value' => $dollarRateX,
                        'last_updated_at'=> null
            ]);
            
            
                DB::table('global_variables_history_log')
                                            ->insert(['name'=>'dollarRate',
                                                    'value' => $dollarRateX,
                                                    'updated_at'=> null
                                                

                                        ]);



              $dollarRate = DB::table('global_variables')->where('name' , 'dollarRate')->value('value');
              $count = DB::table('products')->count();
               
              
             

            //note: nothing is executed after return .... ;
              return view('php-scripts/jsonObjGenerator',[ 
              'count'=>$count,
              'dollarRate'=> (int)$dollarRate
            ]);

            
            
        
      
    }  

    public function change_defaultProfit_post(Request $req){
        
        $defaultProfitX = $req->input('defaultProfit');
        DB::table('global_variables')
              ->where('name', 'defaultProfit')
              ->update(['value' => $defaultProfitX]);


              DB::table('global_variables_history_log')
                            ->insert(['name'=>'defaultProfit',
                                    'value' => $defaultProfitX,
                                    'updated_at'=> null
                                

                        ]);


              $defaultProfit = DB::table('global_variables')->where('name' , 'defaultProfit')->value('value');
              $count = DB::table('products')->count();

              
              return view('php-scripts/jsonObjGenerator',[ 
              'count'=>$count,
              'defaultProfit'=> (int)$defaultProfit
            ]);
            
        
      
    }  











    public function getCategories(Request $req){
        $users = DB::table('categories')->get();
        $array1  = [];
        $array2  = [];

        foreach ($users as $user){
                
                array_push($array1 , $user->category_id);
                array_push($array2 , $user->name);
                
                
                }
        
                $total = [$array1,$array2];
                $total = json_encode($total);
                echo $total;
    }

    
    public function getBrands(Request $req){
        $users = DB::table('brands')->get();
        $array1  = [];
        $array2  = [];

        foreach ($users as $user){
                
                array_push($array1 , $user->id);
                array_push($array2 , $user->name);
                
                
                }
        
                $total = [$array1,$array2];
                $total = json_encode($total);
                echo $total;
    }





    



    public function updatePrice(Request $req){
        $DB = mysqli_connect( 'localhost' , 'root', '' , 'project1' )or die("cannot connect");
         
        $baracode = $req->input('baracode');
        $id = $req->input('id');        
        $price = $req->input('price');
        $currencyBase = $req->input('currencyBase');
        

       DB::table('products')
              ->where('id', $id)
              ->update(['unit_price' => $price,
                        'currency_base'=>$currencyBase
            
            ]);


            $task = DB::table('products')
            ->where('id', $id)
            ->get();

            //print_r($task[0]);
         
            DB::table('products_history_log')
            ->insert(['id'=> $task[0]->id,
                      'product_name'=>$task[0]->product_name,
                      'baracode'=>$task[0]->baracode,
                      'unit_price' => $task[0]->unit_price,
                      'profit_percentage'=>$task[0]->profit_percentage,
                      'profit_type'=>$task[0]->profit_type,
                      'size'=>$task[0]->size,
                      'category_id'=>$task[0]->category_id,
                      'brand_id'=>$task[0]->brand_id,
                      'currency_base'=>$task[0]->currency_base,
                      'group_bool'=>$task[0]->group_bool,
                      'group_baracodes'=>$task[0]->group_baracodes,

          
          ]);

//$newTask = $task->replicate();
//$newTask->setTable('products_history_log');
//$newTask->project_id = 16; // the new project_id
//$newTask->save(); 


    }

    public function getNonEmptyBrands(Request $req){
       $allCatBrandCombinations0 = json_decode($req->input('allCatBrandCombinations0') , true);
        $results = array();

       foreach($allCatBrandCombinations0 as $qqq){
           $arrayx = explode("-",$qqq);
           $queryResults = DB::table('products')->where('category_id', $arrayx[0])
                                 ->where('brand_id', $arrayx[1])
                                 ->get();
           $results[$qqq] = array();//ME
        foreach($queryResults as $result){
            $result->unit_price = (int)$result->unit_price;
        $results[$qqq][$result->id] = $result;
    }


       }
       //warning!!!!
       // not so sure how but it wrks so leave it!!!
       

       //it only send the cat-brand with products in it if the line followed by '//ME' is deleted


   // echo "\n\n\n\n";


   // print_r($req->collect() );
    print_r(json_encode($results));
    }



    public function updateProductInfo(Request $req){

        
        $product = json_decode($req->input("productInfo") , true) ;
        //print_r($product) ;

        
       DB::table('products')
           ->where('id', $product['id'])
              ->update(['product_name'=>$product["product_name"],
                        'baracode'=>$product['baracode'],
                        'unit_price' => $product["unit_price"],
                        'profit_percentage'=>$product['profit_percentage'],
                        'profit_type'=>$product['profit_type'],
                        'size'=>$product['size'],
                        'category_id'=>$product['category_id'],
                        'brand_id'=>$product['brand_id'],
                        'currency_base'=>$product['currency_base'],
                        'group_bool'=>$product['group_bool'],
                        'group_baracodes'=>$product['group_baracodes'],

            
            ]);



            DB::table('products_history_log')
              ->insert(['id'=> $product['id'],
                        'product_name'=>$product["product_name"],
                        'baracode'=>$product['baracode'],
                        'unit_price' => $product["unit_price"],
                        'profit_percentage'=>$product['profit_percentage'],
                        'profit_type'=>$product['profit_type'],
                        'size'=>$product['size'],
                        'category_id'=>$product['category_id'],
                        'brand_id'=>$product['brand_id'],
                        'currency_base'=>$product['currency_base'],
                        'group_bool'=>$product['group_bool'],
                        'group_baracodes'=>$product['group_baracodes'],

            
            ]);
    }


    public function checkBaracodesConflict(Request $req){
        $DB = mysqli_connect( 'localhost' , 'root', '' , 'project1' )or die("cannot connect");
         
        return view('php-scripts/checkBaracodesConflict',[ 
            'DB'=>$DB,
            'req' =>$req
            //'defaultProfit'=> (int)$defaultProfit
          ]);
    }





    //delete product

    public function deleteProduct(Request $req){

        $productsWithId =DB::table('products') /// supposedly ONE
        ->where('id',  $req->id)
        ->get();

        $idArray=[];
        
         foreach($productsWithId as $productx){
             
            array_push($idArray , $productx->id);

        }
        $idArrayJson =json_encode($idArray);
        
        if($productsWithId->count() > 1 ){


            DB::table('errors_log') /// supposedly ONE
                ->insert([
                    
                    'error_title' => "Duplicate IDs",
                    'involved_products' => $idArrayJson,
                    'error_description'=> "error added by AjaxController::deleteProduct.\n While deleting a product with an id = ".$req->id.", the id was used by ".$productsWithId->count()." enteries."
                    
                ]);
                
            
            echo  "Several Entries with same ID.\nError added to database's log of errors.\n";
            
            return null;
        }
        
       


        DB::table('products')
        ->where('id', $req->id)
        ->delete();

        $checkIfFound = DB::table('products')
                            ->where('id', $req->id)->get();
                            

                            if($checkIfFound->count() == 0){
                                echo "Deleted Succesfully!";
                            

                            DB::table('deleted_products')
                                 ->insert(['id'=> $productsWithId[0]->id,
                                           'product_name'=>$productsWithId[0]->product_name,
                                           'baracode'=>$productsWithId[0]->baracode,
                                           'unit_price' =>$productsWithId[0]->unit_price,
                                           'profit_percentage'=>$productsWithId[0]->profit_percentage,
                                           'profit_type'=>$productsWithId[0]->profit_type,
                                           'size'=>0,
                                           'category_id'=>$productsWithId[0]->category_id,
                                           'brand_id'=>$productsWithId[0]->brand_id,
                                           'currency_base'=>$productsWithId[0]->currency_base,
                                           'group_bool'=>$productsWithId[0]->group_bool,
                                           'group_baracodes'=>$productsWithId[0]->group_baracodes,


                               ]);
        
        }


    }






    ///// take backup page    
    
    //takes backup only if no backup have been taken from 3 hours



    public function takeBackup(){
       
        $lastBackup = DB::table('global_variables')->where('name','lastBackup')->get();
        $DB = mysqli_connect( 'localhost' , 'root', '' , 'project1' )or die("cannot connect");
         

        return view('php-scripts/takeBackup',[ 
            'lastBackup'=>$lastBackup,
            'DB'=>$DB,
          ]);
    }



   //public function familyNunito(Request $req){
     //   return view('localResources/familyNunito',['req' =>$req]);
   // } /* didn't work  with php rendering. GET import(stylefont.css) worked*/



}
