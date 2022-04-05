<script> 

var b = false;
var oldCat ;
var oldBrand;

/*
//////////
//////////
//////////                  save changes to product
//////////
//////////
//////////                                                                        */
$(
    $(document).on('submit', '#qq', function (event) {
    
     event.preventDefault();
      if (currentProductInfo == undefined ){
        
        alert('No product is being edited!');
        return 0;
        }
     currentProductInfo.product_name = $("#name-input").val() ;

     if($('#baracode-input').is(':disabled')){
     currentProductInfo.baracode = 'NULL';
}else{currentProductInfo.baracode = $("#baracode-input").val() ;}
     currentProductInfo.size = $("#size-input").val() ;
     
    checkConflict();

    if (conflict == true){
        alert("there is a conflict");
        return false;// returning anything stops the rest from executing
    }



/////        loading  after pressing SAVE   / ///////
    if($("#save-loading").hasClass("d-flex") == false){
    $("#save-loading").removeClass("d-none");
    $("#save-loading").addClass("d-flex");
    }

      if($("#saveSuccess").hasClass("d-flex") == true){
                                $("#saveSuccess").removeClass('d-flex');
                                $("#saveSuccess").addClass("d-none");
                                }

                   if($("#saveError").hasClass("d-flex") == true){
                  $("#saveError").removeClass('d-flex');
                 $("#saveError").addClass("d-none");
                   }
////




        // configuring currency base and unit_price
    if($("#currency_base-input").val() == "dollar"){
            currentProductInfo.currency_base = "dollar";
        if($("#dollar-dollar-input").val() != ""){
            currentProductInfo.unit_price = $("#dollar-dollar-input").val();
            currentProductInfo.unit_price = currentProductInfo.unit_price.replace(/[^\d.]/g, '')
           
        }else if($("#dollar-lira-input").val() != ""){
            currentProductInfo.unit_price = $("#dollar-lira-input").val();
            currentProductInfo.unit_price = currentProductInfo.unit_price.replace(/[^\d.]/g, '')
         currentProductInfo.unit_price = currentProductInfo.unit_price / dollarRate ;
        }else{
            alert("there is an error at setting the new unit_price for it to be updated to the database!");
            return false;
        }
        
    }else if($("#currency_base-input").val() == "lira"){
         currentProductInfo.unit_price = $("#lira-lira-input").val();
         currentProductInfo.unit_price = currentProductInfo.unit_price.replace(/[^\d.]/g, '')
         currentProductInfo.currency_base = "lira";
    }else{
         alert("there is an error at setting the new unit_price for it to be updated to the database!");
            return false;
    }



    //configuring the profit and the profit type


        if($("#WholesaleFinal").val() == "wholesale"){
            currentProductInfo.profit_type = "special";
            currentProductInfo.profit_percentage = $("input[name='profit']").val();

        } else if($("#WholesaleFinal").val() == "wholesaleDefault"){
            currentProductInfo.profit_type = "global";
            currentProductInfo.profit_percentage = null;
        }else if($("#WholesaleFinal").val() == "final"){
            currentProductInfo.profit_type = "special";
            currentProductInfo.profit_percentage = 0;
        }

    


if(currentProductInfo.category_id != $("#categories").val() || currentProductInfo.brand_id != $("#brands").val()){
    
    //delete allProductsObject[currentProductInfo['category_id']][currentProductInfo['brand_id']][currentProductInfo['id']];
    //updateSidebarWithBrands()

        oldBrand =  currentProductInfo.brand_id ;
        oldCat = currentProductInfo.category_id ;
    // commented out and made to happen only when the ajax request succeeds
    currentProductInfo.category_id = $("#categories").val() ;
    currentProductInfo.brand_id = $("#brands").val() ;
  //  allProductsObject[currentProductInfo['category_id']][currentProductInfo['brand_id']][currentProductInfo['id']] = Object.assign({}, currentProductInfo);
    
   
    b = true;

}else{
    b = false;
}

//updating the productList Tab without viewing it



     /*currentProductInfo.product_name = $("#name-input").val() ;
     currentProductInfo.product_name = $("#name-input").val() ;
     currentProductInfo.product_name = $("#name-input").val() ; */




    
     
      var token =  $('input[name="_token"]').attr('value')
       var potato = {
        productInfo:JSON.stringify(currentProductInfo) ,
        _token : token
       
       }
     // LOOK AT ME! BETWEEN HERE AND 
   
        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Csrf-Token', token);
                //xhr.setRequestHeader('sec-ch-ua-platform',"andriod");

            }
        });
    // HERE   // don't remove

    $.ajax({
        url: "{{route('checkBaracodesConflict')}}",
        type: 'post',
        data : potato,
        success: function (data){
             window.obj = JSON.parse(data);
            console.log(obj)

            if(obj.groupBaracodesWithConflict.length === 0 & obj.singleBaracodeConflict == false & obj.productNameConflict == false){
                updateProductInfo();

              
            }else{
                $("#saveError strong").html("Error! The product name or a barcode is being used by another product.");
                 if($("#save-loading").hasClass("d-flex") == true){
                 $("#save-loading").addClass("d-none");
                 $("#save-loading").removeClass("d-flex");
                  }
                  if($("#saveSuccess").hasClass("d-flex") == true){
                                $("#saveSuccess").removeClass('d-flex');
                                $("#saveSuccess").addClass("d-none");
                                }

                   if($("#saveError").hasClass("d-flex") == false){
                  $("#saveError").addClass('d-flex');
                 $("#saveError").removeClass("d-none");
                   }

                  

            }
        },
         error:  function (xhr , status , error) {

                $("#saveError strong").html("Error! Internal Server or database error.");
               if($("#save-loading").hasClass("d-flex") == true){
                 $("#save-loading").addClass("d-none");
                 $("#save-loading").removeClass("d-flex");
                  }
                  if($("#saveSuccess").hasClass("d-flex") == true){
                                $("#saveSuccess").removeClass('d-flex');
                                $("#saveSuccess").addClass("d-none");
                                }

                   if($("#saveError").hasClass("d-flex") == false){
                  $("#saveError").addClass('d-flex');
                 $("#saveError").removeClass("d-none");}

                @include("errors/error-xhr-modals")
         }
        
        })







 





                                                // make an error backup 
           if (false) {
             $.ajax({
        url: '/consoleLog-post',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  
            console.log(data);
            },
        error: function (xhr , status , error) {
             var err = eval("(" + xhr.responseText + ")");
             alert(err.message);
         }
            }); 
            ;}
          
    })
    )






























    var updateProductInfo = ()=>{


         
      var token =  $('input[name="_token"]').attr('value')
       var potato = {
        productInfo:JSON.stringify(currentProductInfo) ,
        _token : token
       
       }
     $.ajax({
        url: "{{route('updateProductInfo')}}",
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  



           if(b == true){
   
   delete allProductsObject[oldCat][oldBrand][currentProductInfo['id']];
   
  //  currentProductInfo.category_id = $("#categories").val() ;
   // currentProductInfo.brand_id = $("#brands").val() ;
  //  allProductsObject[currentProductInfo['category_id']][currentProductInfo['brand_id']][currentProductInfo['id']] = Object.assign({}, currentProductInfo);
    
   
    

}




                allProductsObject[currentProductInfo['category_id']][currentProductInfo['brand_id']][currentProductInfo['id']] = Object.assign({}, currentProductInfo);
    if(b == true){updateSidebarWithBrands()}
        fun5( parseInt(currentProductInfo.category_id) , parseInt(currentProductInfo.brand_id) ,true)

  
        if($("#catID-"+currentProductInfo.category_id +" h2 .accordion-button").hasClass('collapsed') == true){
            $("#catID-"+currentProductInfo.category_id +" h2 .accordion-button").click();

        }


                if($("#save-loading").hasClass("d-flex") == true){
                        $("#save-loading").addClass("d-none");
                        $("#save-loading").removeClass("d-flex");
                        }
                if($("#saveSuccess").hasClass("d-flex") == false){
                                $("#saveSuccess").addClass('d-flex');
                                $("#saveSuccess").removeClass("d-none");
                                }
                if($("#saveError").hasClass("d-flex") == true){
                                $("#saveError").removeClass('d-flex');
                                $("#saveError").addClass("d-none");
                                }
           
            
            
            },
        
        
        
        
        
        error:  function (xhr , status , error) {
                $("#saveError strong").html("Error! Internal Server or database error.");
              if($("#save-loading").hasClass("d-flex") == true){
                 $("#save-loading").addClass("d-none");
                 $("#save-loading").removeClass("d-flex");
                  }
                  if($("#saveSuccess").hasClass("d-flex") == true){
                                $("#saveSuccess").removeClass('d-flex');
                                $("#saveSuccess").addClass("d-none");
                                }

                   if($("#saveError").hasClass("d-flex") == false){
                  $("#saveError").addClass('d-flex');
                 $("#saveError").removeClass("d-none");}


            @include("errors/error-xhr-modals")
         }
            })
     }










     
    </script>