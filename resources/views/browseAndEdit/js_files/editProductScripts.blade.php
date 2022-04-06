
<script>


var ppp1= '<div id="catID-';
//category ID
var ppp2='"class="accordion-item">{{--category--}}<h2 class="accordion-header" id="flush-headingNotImportant"><button class="accordion-button  accordion-button-custom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-catID-'
//category ID
var ppp3='" aria-expanded="false" aria-controls="flush-collapse-catID-'
//category ID
var ppp4 ='"><span class="fs-5">'
// category name
var ppp5='</span></button></h2><div id="flush-collapse-catID-'
//category ID
var ppp6 = '" class=" accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#sidebar"><table class="table mb-0"><tbody> </tbody></table></div></div>'

var var112;

///general functions (executed multiple times)
var productsListTabIsActive = ()=>{

$("#productsListTab").addClass("active")
$("#productTab").removeClass("active")
$("#qq").hide();
$("#productsListInaBrand").show();
$("#productsListInaBrand").addClass('d-flex');

$("#firstDisplayMessage").hide();  

setTimeout(()=>{
     xx= $("#tableContainer").outerHeight();
$(".table-fixed tbody ").outerHeight(xx - 50);
},20)
}




var productTabIsActive = ()=>{
if (currentProductInfo == undefined ){
$("#pleaseChooseProductModalButton").click();
return null;
}
  
$("#productsListTab").removeClass("active")
    $("#productTab").addClass("active")
   
   
      
       $("#firstDisplayMessage").hide();     
$("#qq").show();$("#qq").removeClass("d-none")
$("#productsListInaBrand").hide();$("#productsListInaBrand").removeClass('d-flex');



    
    
}





/// get getCatNameById()
var var101;
var getCatNameById = (catID)=>{
        var101  = catIDs.indexOf(catID);
        return catNames[var101];
}
var var102;
var getBrandNameById = (brandID)=>{
        var102  = brandIDs.indexOf(brandID);
        return brandNames[var102];
}

//
var currentProductInfo;
///6
var fun6 = (catID , brandID , productID,bool = false)=>{


///Remove previous alert boxes 

  if($("#save-loading").hasClass("d-flex") == true){
                 $("#save-loading").addClass("d-none");
                 $("#save-loading").removeClass("d-flex");
                  }
                  if($("#saveSuccess").hasClass("d-flex") == true){
                                $("#saveSuccess").removeClass('d-flex');
                                $("#saveSuccess").addClass("d-none");
                                }

                   if($("#saveError").hasClass("d-flex") == true){
                  $("#saveError").removeClass('d-flex');
                 $("#saveError").addClass("d-none");
                   }



        currentProductInfo = _.cloneDeep(allProductsObject[catID][brandID][productID]);
        //there is also= _.clone(obj);;



        productTabIsActive()

    //clear all previuous inputs
        $("#name-input").val("");
        $("#baracode-input").val("");
        $("#size-input").val("");
        //$("#currency_base-input").val("");
         $("#dollar-dollar-input").val("");
         $("#dollar-lira-input").val("");
         $("#lira-lira-input").val("");
         $('input[name="profit"]').val("");
         $('#categories').val('');
         $('#brands').val('');




        $("#name-input").val(currentProductInfo.product_name);
        $("#baracode-input").val(currentProductInfo.baracode);
        $("#size-input").val(currentProductInfo.size);
       // $("#currency_base-input").val(currentProductInfo.currency_base);
        if(currency_base != currentProductInfo.currency_base){
             $('#switch-currency-base').click()
        }
        
        checkConflict();
        if(currency_base == "dollar"){
            x=8;
            $("#dollar-dollar-input").val(currentProductInfo.unit_price);
        }else{
            x=11;
            $("#lira-lira-input").val(currentProductInfo.unit_price);
            }
        


        if(currentProductInfo.profit_type == "special"){
            if(currentProductInfo.profit_percentage == 0){
                $('#WholesaleFinal').val("final")
            }else if(currentProductInfo.profit_percentage != 0){
                 $('#WholesaleFinal').val("wholesale")
            }
        }else if(currentProductInfo.profit_type == "global"){
            $('#WholesaleFinal').val("wholesaleDefault")
        }

        configProfitInfo();
        if(currentProductInfo.profit_type == "special"){
            if(currentProductInfo.profit_percentage != 0){
                $('input[name="profit"]').val(currentProductInfo.profit_percentage)
            }
        }

        $('#categories').val(currentProductInfo.category_id);
         $('#brands').val(currentProductInfo.brand_id);





        /////      group status


        //note: the hidden input#group_baracodes isn't needed to be updated here

        if(currentProductInfo.group_bool == 1){

            
            peppery = currentProductInfo['group_baracodes'];
            groupBaracodes = currentProductInfo['group_baracodes'].split(',');
            $("#group-baracodes-table table tbody").empty()
            groupBaracodes.forEach((bar)=>{
                 $("#group-baracodes-table table tbody").append(tt1 + bar + tt2 + bar + tt3 + bar + tt4)
   

            })
            if($("#group-bool").val() =="false" ){
               $("#group-bool").val(0)  
                }else if($("#group-bool").val() =="true" ){
                    $("#group-bool").val(1) 
                }

            if ($("#group-bool").val() != currentProductInfo.group_bool){
                //$("#group-bool").val(currentProductInfo.group_bool);;
                 $("#switch3").click()
            }
            
        }else{
            peppery = "";
            groupBaracodes = [];
            $("#group-baracodes-table table tbody").empty()
            

            if($("#group-bool").val() =="false" ){
               $("#group-bool").val(0)
                }else if($("#group-bool").val() =="true" ){
                    $("#group-bool").val(1) 
                }
               
               
               if($("#group-bool").val() != currentProductInfo.group_bool){
                   //$("#group-bool").val(currentProductInfo.group_bool);
                   $("#switch3").click()
                   }
 
            
            
        }









      
        /*$("#").val(currentProductInfo);
        $("#").val(currentProductInfo);
        $("#").val(currentProductInfo);
        $("#").val(currentProductInfo);
        $("#").val(currentProductInfo);
        $("#").val(currentProductInfo);
        $("#").val(currentProductInfo);*/
         $("#name-input").focus();


}







///5

var pc1 = '<tr id="';
//product id
var pc2 ='" style="display:block;"><th scope="col" class=" td-class justify-content-start" width="11.3%"  style="height:50px;" ><span class="id-cell"></span></th><td scope="col" class=" td-class" width="16%"  style="height:50px;" ><span class="product_name-cell"></span></td><td scope="col" class=" td-class" width="16%"  style="height:50px;" ><span class="baracode-cell"></span></td><td scope="col" class=" td-class" width="11.3%"  style="height:50px;" ><span class="base_price-cell"></span></td><td scope="col" class=" td-class" width="15.3%"  style="height:50px;" ><span class="currency_base-cell"></span></td><td scope="col" class=" td-class" width="10.3%"  style="height:50px;" ><span class="profit_type-cell"></span></td><td scope="col" class=" td-class" width="10.3%"  style="height:50px;" ><span class="profit-cell"></span></td><td scope="col" class=" td-class" width="9.3%" style="height:50px;"><button class="btn btn-primary">Edit</button></td></tr>'
     var cat ,brand;                       
                            var keys;
                            var dataForDataTable = [];
                            var tablexy ;
var Cat_Brand;
var productsTableSelector = ".table-responsive .table.table-fixed tbody";
var fun5 = (catID , brandID , bool = false)=>{

        $("#productsListTableContainer").addClass('table-responsive')
        $("#productsListTable").addClass(['table' , 'table-fixed'])
        $("#catBrandTitle").html( getCatNameById(catID) + " -> " + getBrandNameById(brandID) )
        console.log(allProductsObject[catID][brandID]); 

        // remove the previous table
        $(".table-responsive .table.table-fixed").html('');

       if(Object.keys(allProductsObject[catID][brandID]).length < 75 ){

            if ( $.fn.dataTable.isDataTable( '#productsListTable' ) ){
                tablexy.destroy();
                tablexy = {};
                $("#productsListTable").html("")
            }

        $(".table-responsive .table.table-fixed").html(' <thead><tr style="display:block;padding-right:17px;"><th scope="col" width="11.33%">#ID</th><th scope="col" width="16%">Product Name</th><th scope="col" width="16%">Barcode</th><th scope="col" width="11.33%">Base Price</th><th scope="col" width="15.33%">Currency Base</th><th scope="col" width="10.33%">Profit Type</th><th scope="col" width="10.33%">Profit</th><th scope="col" width="9.33%">Edit</th></tr></thead><tbody></tbody>');
        
       

        keys = Object.keys(allProductsObject[catID][brandID]);
        Cat_Brand=allProductsObject[catID][brandID];


        $("#tableContainer").removeClass('shadow');


        //clear the table 
        $(productsTableSelector).html("")

        //append each product
        keys.forEach((itemx,indexx)=>{
            $(productsTableSelector).append(pc1 + Cat_Brand[itemx].id+pc2)
            $("tr#" + Cat_Brand[itemx].id + " th span.id-cell").html(Cat_Brand[itemx].id)
        $("tr#" + Cat_Brand[itemx].id + " td span.product_name-cell").html(Cat_Brand[itemx].product_name)
        $("tr#" + Cat_Brand[itemx].id + " td span.baracode-cell").html(Cat_Brand[itemx].baracode)
        $("tr#" + Cat_Brand[itemx].id + " td span.base_price-cell").html(Cat_Brand[itemx].unit_price)
        if(Cat_Brand[itemx].currency_base){$("tr#" + Cat_Brand[itemx].id + " td span.base_price-cell").html(Cat_Brand[itemx].unit_price)}
        $("tr#" + Cat_Brand[itemx].id + " td span.currency_base-cell").html(Cat_Brand[itemx].currency_base)
        $("tr#" + Cat_Brand[itemx].id + " td span.profit_type-cell").html(Cat_Brand[itemx].profit_type)
        $("tr#" + Cat_Brand[itemx].id + " td span.profit-cell").html(Cat_Brand[itemx].profit_percentage)
        $("tr#" + Cat_Brand[itemx].id + " td button.btn").attr('onclick' , 'fun6('+Cat_Brand[itemx].category_id+','+Cat_Brand[itemx].brand_id+','+Cat_Brand[itemx].id+ ')' )
        
        if(Cat_Brand[itemx].group_bool == 1){
            $("tr#" + Cat_Brand[itemx].id + " td span.product_name-cell").append(" <span style='color:blue'>(group)</span>")
        }
        
        })
        
 
       }else{
           
        keys = Object.keys(allProductsObject[catID][brandID]);
        Cat_Brand=allProductsObject[catID][brandID];
        dataForDataTable = [];
        keys.forEach((item , index)=>{

            window.product = Cat_Brand[item];
            dataForDataTable.push([product.id ,product.product_name , product.unit_price, product.baracode , product.category_id+" - "+product.brand_id]);

            

        })
        

        $("#productsListTable").removeClass();
        $("#productsListTableContainer").removeClass();
        $("#tableContainer").removeClass('shadow');


        $(document).ready(function() {


            if ( $.fn.dataTable.isDataTable( '#productsListTable' ) ){
                tablexy.destroy();
                tablexy = {};
                $("#productsListTable").html("")
            }





    tablexy = $('#productsListTable').DataTable( {
        data: dataForDataTable,
         // "dom": 'Bfrtip',
        "scrollY":        "60vh",
        "scrollCollapse": false,
        "paging":         false,
        pageLength: 8,
       // scrollY: true,
        columns: [
            { title: "id" },
            { title: "Product Name" },
            { title: "Unit Price" },
            { title: "baracode" },
            { title: "category-brand" }
        ],

         dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
             {
                        "extend": "pdf",
                        "text": "Export as PDF",
                        "filename": "Report Name",
                        "className": "btn btn-green",
                        "charset": "utf-8",
                        "bom": "true",
                        init: function(api, node, config) {
                            $(node).removeClass("btn-default");
                        }
                    }
        ]


    } );


    
    /// making the rows clickable

     $('#productsListTable tbody').on('click', 'tr', function () {
        var datad = tablexy.row( this ).data();
        //alert( 'You clicked on '+datad[0]+'\'s row' );

        fun6(Cat_Brand[datad[0]].category_id    ,    Cat_Brand[datad[0]].brand_id    ,    datad[0])
    } );






} );

        
           
       }
       
       
       
       
       if (bool == true){

        }else{
            productsListTabIsActive()
        }






}
















///4
var currentSelector ;
var updateSidebarWithBrands = () =>{

    catIDs.forEach((itemq)=>{
        
    currentSelector = '#catID-'+ itemq + ' #flush-collapse-catID-'+ itemq + ' table tbody';
    $(currentSelector).empty();


       brandIDs.forEach((itemqq,indexqq)=>{
           
           if(Object.keys(allProductsObject[itemq][itemqq]).length > 0){
              
        $(currentSelector).append(
            
            '<tr>'+'<td style="padding-left:2.4rem;font-size:0.9rem" class="pointer_hand" onclick="fun5(' + itemq + ',' + itemqq +')">' + brandNames[indexqq] +' ('+ Object.keys(allProductsObject[itemq][itemqq]).length +')</td></tr>'
        )}

       }

       )


         if ($(currentSelector).is(':empty')){
              $(currentSelector).append(
            
            '<tr>'+'<td style="padding-left:2.4rem;font-size:0.9rem" class="pointer_hand text-danger fw-bold " >' + 'No Products in this Category' +' </td></tr>'
              
              )
              
            }
    }

    )
    

    if($("#sidebar-loading").hasClass('d-none') == false )
    {
    $("#sidebar-loading").addClass('d-none');
    }
}







catBrandCombinations = [];

 var dataxx ={};
 var productsInCatBrands;
 var currentCatBrand;
 ///3
  var fillAllProductsObject= ()=>{
      if(typeof(allCatBrandCombinations) != "string" ){
          allCatBrandCombinations = JSON.stringify(allCatBrandCombinations);
          }// this way the array wont be stringified twice when the function is called again

      
      dataxx = {
    _token : token,
    allCatBrandCombinations0 :allCatBrandCombinations
} 


 
     $.ajax({
       url: "{{route('getNonEmptyBrands')}}"  ,
       type: "Post",
       async: true,
       data: dataxx,
       success: function (data) {



           // fill the AllProductsObject with products
         productsInCatBrands  = JSON.parse(data);
         productsInCatBrandsKeys = Object.keys(productsInCatBrands);
         productsInCatBrandsKeys.forEach((item,index)=>{
            currentCatBrand = allProductsObject[item.split("-")[0]][item.split("-")[1]];


            Object.keys(productsInCatBrands[item]).forEach((itemx,indexx)=>{
            currentCatBrand[itemx] = productsInCatBrands[item][itemx];

            })
         }
         
         )
         /////



        updateSidebarWithBrands();




       },
       error: function (xhr, exception) {
           var msg = "";
           if (xhr.status === 0) {
               msg = "Not connect.\n Verify Network." + xhr.responseText;
           } else if (xhr.status == 404) {
               msg = "Requested page not found. [404]" + xhr.responseText;
           } else if (xhr.status == 500) {
               msg = "Internal Server Error [500]." +  xhr.responseText;
           } else if (exception === "parsererror") {
               msg = "Requested JSON parse failed.";
           } else if (exception === "timeout") {
               msg = "Time out error." + xhr.responseText;
           } else if (exception === "abort") {
               msg = "Ajax request aborted.";
           } else {
               msg = "Error:" + xhr.status + " " + xhr.responseText;
           }
          
       }
   }); 

   // end of getcategories fn
 
  }




//alert("chh");

var allProductsObject = {};
var allCatBrandCombinations = [];
var currentCatID = 0;
var currentBrandID = 0;

///2
  var getAllProductsObject= (callback)=>{
      
    for( let zz = 0; zz < catIDs.length ; zz++){

         currentCatID = catIDs[zz];
         allProductsObject[currentCatID]= {};




                 for( let ff = 0; ff < brandIDs.length ; ff++){

                currentBrandID = brandIDs[ff];
                allProductsObject[currentCatID][currentBrandID] = {};
                allCatBrandCombinations.push(catIDs[zz]+"-"+brandIDs[ff]);
              } 

              }  
              if(typeof callback == "function"){
    	callback(); //execute function if function is truly a function.
    } 

  }










/// 1
    var configCatInSidebar = (callback) => {
  for(let i=0 ; i < catIDs.length ;i++){
  $("#sidebar").prepend(ppp1 + catIDs[i] +ppp2 + catIDs[i] +ppp3 + catIDs[i] + ppp4 + catNames[i] + ppp5 + catIDs[i] + ppp6 )
           
         }
         if($("#sidebar-loading").hasClass('d-none') == true )
    {
    $("#sidebar-loading").removeClass('d-none');
    }

        if(typeof callback == "function"){
    	callback(); //execute function if function is truly a function.
    }
}



/// functions


var getCatNameById = (cat_id) => {
    let index = catIDs.indexOf(cat_id);
    return catNames[index] ;
}

var getBrandNameById = (brand_id) => {
    let index = brandIDs.indexOf(brand_id);
    return brandNames[index] ;
}
        

</script>
