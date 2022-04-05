<script>
 var x =0 ;
 if(typeof hhh ==="undefined"){var hhh}
  if(typeof hhh2 ==="undefined"){var hhh2}
if(typeof conflict2 ==="undefined"){var conflict2}
$('input[name="baracode"]').focus();

$($('input[name="baracode"]').keyup(function(event) {
    if (event.key === "Enter") {
        
        $('input[name="baracode"]').val("");
        

    }
}))
var token =  $('input[name="_token"]').attr('value');

var round = (par)=>{
    par = par/250;
    par = Math.ceil(par);
    par = par*250 ;
    return par ;
}


// the ajax to submit the baracode and get tyhe productInfo
































//// ajax for updating the price



$($(document).on('submit', '#qq', function (event) {
      event.preventDefault(); 
      checkConflict();
    if(conflict){
          alert("There is a conflict");
          return null;
      }else{
            
        var token =  $('input[name="_token"]').attr('value');

        var pricex ;

        if (currency_base == 'dollar'){
            if($('#dollar-lira-input').val()==""){
                pricex = $('#dollar-dollar-input').val();
                pricex = pricex.replace(/[^\d.]/g, '') 
                // do nothing the price is already in dollar
            }else if($('#dollar-dollar-input').val()==""){
                pricex = $('#dollar-lira-input').val();
                pricex = pricex.replace(/[^\d.]/g, '')
                pricex = pricex / dollarRate ;
            }
        }else if (currency_base == 'lira'){
             pricex = $('#lira-lira-input').val();
             pricex = pricex.replace(/[^\d.]/g, '') 

        }



       var datax = {
        baracode: productInfo.baracode,
        id : productInfo.id,
        currencyBase: currency_base,
        price: pricex,
        _token : token,
       
       }



        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Csrf-Token', token);
            }
        });

            $.ajax({
        url: '/updatePrice',
        type: 'post',
        data : datax,
        success: function (data) {
                window.productInfo = {};
            $('#card1').removeClass('d-none'); 
            $('#card2').addClass('d-none'); 
            checkConflict();
            $('#dollar-dollar-input').val("");
            $('#dollar-lira-input').val("");
            $('#lira-lira-input').val("");
            
            $('#submitBaracode').focus();



            
            
           
           


             









          },error:  function (xhr , status , error) {
             @include("errors/error-xhr-modals")
         }
        })
      

}// executed after conflict == false





      if(currency_base=="dollar"){


     

      }
      
      
      }) );















































  getCategories();




































  getBrands();




























// card2 javascript settings
   
      // var x =0 ;   moved to the top
       var currency_base ;
        
        
        var updateCurrency = (par)=>{ 

        if((par%2)==0){     currency_base = "dollar";
                 }else{
                            currency_base = "lira";}        };






   //// function changing styles
    var changeCss = (par)=>{
 
            $('#lira-fields').toggleClass('card',(par=="lira"))
            $('#lira-fields').toggleClass('border-3',(par=="lira"))
            $('#lira-fields').toggleClass('border-blue',(par=="lira"))

            $('#dollar-fields').toggleClass('card',(par=="dollar"))
            $('#dollar-fields').toggleClass('border-3',(par=="dollar"))
            $('#dollar-fields').toggleClass('border-green',(par=="dollar"))   
    }




        //// function disabling inputs
    var confgFields = (par)=>{

         if(par=="dollar"){
       $($('#dollar-dollar').removeAttr('disabled'));
        $($('#dollar-lira').removeAttr('disabled'));
        $($('#lira-lira').attr('disabled',""))
        
       }else{
            $($('#dollar-dollar').attr('disabled',""));
            $($('#dollar-lira').attr('disabled',""));
            $($('#lira-lira').removeAttr('disabled'));     }
                                                                     }


        //function checking if there is 2 inputs and assigning a propery in the post array 
        var conflict = true;
         
      var checkConflict = ()=>{
        conflict = ($("#dollar-lira-input").val()!="" &&  $("#dollar-dollar-input").val()!="");
            $("#dollar-dollar-input").toggleClass("is-invalid",conflict);
            $("#dollar-lira-input").toggleClass("is-invalid",(conflict|| conflict2));
    }


   // calling each function once at first
    updateCurrency(x);
    changeCss(currency_base);
    checkConflict();
    $('#currency_base-input').val(currency_base);
    confgFields(currency_base);
     if($("#dollar-lira-input").val()!=""   &&  $("#dollar-dollar-input").val()==""){
              $($('#dollar-dollar-input').removeAttr('required'));
             $($('#dollar-lira-input').attr('required',""))
             }

//$.ready starts
    
        
    /////////////          the clickevent listener foe the switch
    $( "#switch-currency-base" ).click(function() { 
  //alert('thats it');
    x++;
    updateCurrency(x);
    checkConflict();
      
    changeCss(currency_base);
    confgFields(currency_base);
  
   
})
///////


/////$.ready ends



       // function for detecting the wanted field and making it required
    $(function(){
            ////////changeevent for dollar-based input field
            


               $($("#dollar-lira-input").keyup(function(){
                checkConflict();
                 if($("#dollar-lira-input").val()==""   &&  $("#dollar-dollar-input").val()!=""){
              $($('#dollar-lira-input').removeAttr('required'));
             $($('#dollar-dollar-input').attr('required',""))
             }else if($("#dollar-lira-input").val()!=""   &&  $("#dollar-dollar-input").val()==""){
              $($('#dollar-dollar-input').removeAttr('required'));
             $($('#dollar-lira-input').attr('required',""))
             }




            checkConflict();
             hhh = $('#dollar-lira-input').val()
            hhh = hhh
            
            hhh2 = hhh.replace(/[^0-9,]/g, '')
           
            if(hhh2 != hhh ){
           
            $("#dollar-lira-feedback").html("Enter Only Numbers! Non-numeric characters will be removed ");conflict2=true;
            }else{ $("#dollar-lira-feedback").html(""); conflict2=false}
           hhh = hhh2.replace(/,/g, "") 
            $('#dollar-lira-input').val(addCommas(hhh));
           




                }))
            ;


            $($("#dollar-dollar-input").keyup(function(){
                checkConflict();
                 if($("#dollar-lira-input").val()!=""   &&  $("#dollar-dollar-input").val()==""){
              $($('#dollar-dollar-input').removeAttr('required'));
             $($('#dollar-lira-input').attr('required',""))
             }else     if($("#dollar-lira-input").val()==""   &&  $("#dollar-dollar-input").val()!=""){
              $($('#dollar-lira-input').removeAttr('required'));
             $($('#dollar-dollar-input').attr('required',""))
             }










                }
            ));



             $($("#lira-lira-input").keyup(function(){
                 
             
             hhh = $('#lira-lira-input').val()
            hhh = hhh
            
            hhh2 = hhh.replace(/[^0-9,]/g, '')
            if($("#lira-lira-input").hasClass("is-invalid")){
                $("#lira-lira-input").removeClass("is-invalid");
            }
            if(hhh2 != hhh ){
            $("#lira-lira-input").addClass("is-invalid");
            $("#lira-lira-feedback").html("Enter Only Numbers! Non-numeric characters will be removed ");
            }
           hhh = hhh2.replace(/,/g, "") 
            $('#lira-lira-input').val(addCommas(hhh));
                 checkConflict();
                }
            ));
            /* $(
                $('#addProduct-submit').hover(function(){
                    if($("#dollar-dollar-input").val()!=""){
                        $($('#dollar-lira-input').removeAttr('required'));
                        $($('#dollar-dollar-input').attr('required',""))
                    }else if ($("#dollar-lira-input").val()!=""){
                        $($('#dollar-dollar-input').removeAttr('required'));
                        $($('#dollar-lira-input').attr('required',""))
                    }
                })
            ) */
})


























var applyProfit=(ee)=>{
if(ee.profitType == "special"){
    ee.finalPrice = ee.unitPrice*(1+(ee.profitPercent/100));
}else if(ee.profitType == "global"){
    ee.finalPrice = ee.unitPrice*(1+(globalProfit/100));
}
}

console.log("All non numerical characters are removed automatically.")
console.log("All non numerical characters are removed automatically.")
console.log("All non numerical characters are removed automatically.")


if(typeof popup === "undefined"){var popup}
popup = document.getElementById("popup");
var baracodeArray=[];
var productsArray=[];
var baracodetemp ;

var popupHideAfterDelay;
//submitting the baracode and getting the productInfo

$(
    $(document).on('submit', '#baracodeForm', function (event) {
            event.preventDefault(); 
            

            baracodetemp = $('input[name="baracode"]').val();
            baracodetemp = baracodetemp.replace(/[^\d.]/g, '');
            
       var potato = {
        baracode: baracodetemp,
        _token : token,
       
       }
        //clear previous timeouts
        
       clearTimeout(popupHideAfterDelay);

       if(potato.baracode == 0 || potato.baracode == "" || potato.baracode == " "){
            
            $('#popup').html("You are trying to send an Empty Request!");
            console.log("empty Request is being sent");
            $('#popup').show();
            $("#popup").animate( { "opacity": "show", bottom:"200"} , 500  );
            popupHideAfterDelay = setTimeout(   ()=>{$("#popup").hide();$("#popup").css('bottom','0px') }     ,   4000);

                // Check if the popup is shown
              //  setTimeout(() =>{ if(popup.classList.contains("show")) {popup.classList.remove("show")}}, 4000)
            return null ;
       }
       baracodeArray.push(potato.baracode)

        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Csrf-Token', token);
            }
        });

        $.ajax({
        url: '/getProduct-post',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  
            
            if(data == "Not Found"){
               
                 $('#popup').html("Barcode Not Found!");
                
                $('#popup').show();
                     $("#popup").animate( { "opacity": "show", bottom:"200"} , 500  );
                    popupHideAfterDelay = setTimeout(   ()=>{$("#popup").hide(),$("#popup").css('bottom','0px') }     ,   2500);

                // Check if the popup is shown
                //setTimeout(() =>{ if(popup.classList.contains("show")) {popup.classList.remove("show")}}, 4000) // If yes hide it after 10000 milliseconds
                 console.log("product with baracode "+baracodeArray[baracodeArray.length-1] + " is not found");
            console.log(data.currency_base)
            return null;
            }
            data = JSON.parse(data);
             if(data.unitPrice== "conflict"){
                $('#popup').html("There was a conflict in the barcode you entered or the database! <span class='fw-bold'>Please contact the developer.</span><br>" + data.productName);
                $('#popup').show();
                     $("#popup").animate( { "opacity": "show", bottom:"200"} , 500  );
                    popupHideAfterDelay = setTimeout(   ()=>{$("#popup").hide(),$("#popup").css('bottom','0px') }     ,   2500);

                // Check if the popup is shown
               // setTimeout(() =>{ if(popup.classList.contains("show")) {popup.classList.remove("show")}}, 4000) // If yes hide it after 10000 milliseconds
                 console.log("There was a conflict in the barcode you entered or the database! ");




            }else{
            
            
            console.log(data);
            productsArray.push(data);
             $('input[name="baracode"]').val("");

            


           


            data.sub = function () {
                if(this.unitPrice == "Conflict !"){
                    return 0 ;
                    
                
                }else{
                    return this.qauntity * this.unitPrice;
                }
                };
            
            //if not found before
           
                 
             
              
              //calculating the sub-totals
               
            //calculating the total
            window.productInfo = data;
            $('#card1').addClass('d-none'); 
            $('#card2').removeClass('d-none'); 




            if(data.currencyBase == "dollar"){
                    if(x%2 == 0){

                    }else{
                        
                        $('#switch-currency-base').click()
                    }
            }else{
                 if(x%2 == 0){
                     $('#switch-currency-base').click();
                         
                    }else{
                         

                    }
                        
            };




            //updating dollarRate
            
            if( productInfo.currentDollarRate == 0){
                alert('Error.The dollarRate was changed to be zero!!')//s86rf3io952deh
                console.log("Error.The dollarRate was changed to be zero!! Search for this comment in the code. //s86rf3io952deh")
                dollarRate = productInfo.currentDollarRate;
            
            }else{
            dollarRate = productInfo.currentDollarRate;
            }



            // fill the correct price Input with the price 
            

             if( data.unitPrice != "conflict"    ){
                $('#baracode').html(productInfo.baracode);
                                    $('#size').html(productInfo.size);
                                    $('#productName').html(productInfo.productName);

                                    

                                    $('#currencyBase').html(productInfo.currencyBase);


                if(data.currencyBase=="dollar"){
                    
                    // keep it in dollar and don't round it
                    $('#dollar-dollar-input').val(productInfo.unitPrice);
                    

                   
                    $('#basePrice').html(productInfo.unitPrice + " $");
                    if($("#dollarRateRow").length == 0) {
                        $('#beforeDollarRate').after('<tr id="dollarRateRow"><th scope="row">Current Dollar Rate </th><td ><span id="dollarRate"></span></td></tr>');

                      }
                    
                    $('#dollarRate').html(addCommas(dollarRate) + " LBP / $");
                    if(productInfo.profitType == "global"){
                    $('#profitPercentage').html('The Default Value ('+ globalProfit + ")");
                    }else{ 
                         $('#profitPercentage').html(productInfo.profitPercent);
                        }
                    $('#profitType').html(productInfo.profitType);
                    $('#size').html(productInfo.size);
                    $('#baracode').html(productInfo.baracode);
                   // $('#category').html(productInfo.category);
                   // $('#brand').html(productInfo.brand);
                   //determining the category and brand
                   $('#category').html(catNames[catIDs.indexOf(parseInt(productInfo.categoryId))]);
                    $('#brand').html(brandNames[brandIDs.indexOf(parseInt(productInfo.brandId))]);
                 
                 
                 
                 
                 
                 
                    //determining the final price algorithm
                                        applyProfit(productInfo);
                                    if(productInfo.currencyBase == "dollar"){
                                     productInfo.finalPrice = round(productInfo.finalPrice * dollarRate );
                                     }else{
                                          productInfo.finalPrice = round(productInfo.finalPrice);
                                    
                                     }
                                        $('#finalPrice').html(addCommas(productInfo.finalPrice) + " LBP");
                                        //







                    $('#dollar-dollar-input').focus();


            }else if(data.currencyBase=="lira"){
                     data.unitPrice = round(data.unitPrice);
                     $('#lira-lira-input').val(productInfo.unitPrice);
                    

                    if($("#dollarRateRow" ).length != 0) {
                        $('#dollarRateRow').remove();
                        }
                    $('#dollarRateRow').remove();
                    $('#baracode').html(productInfo.baracode);
                    $('#basePrice').html(addCommas(productInfo.unitPrice) +" LBP");
                   if(productInfo.profitType == "global"){
                    $('#profitPercentage').html('The Default Value ('+ globalProfit + ")");
                    }else{ 
                         $('#profitPercentage').html(productInfo.profitPercent);
                        }
                    $('#profitType').html(productInfo.profitType);
                    $('#size').html(productInfo.size);
                    $('#baracode').html(productInfo.baracode);
                   // $('#category').html(productInfo.category);
                   // $('#brand').html(productInfo.brand);
                   //determining the category and brand
                   $('#category').html(catNames[catIDs.indexOf(parseInt(productInfo.categoryId))]);
                    $('#brand').html(brandNames[brandIDs.indexOf(parseInt(productInfo.brandId))]);
                 



                    //determining final Price
                     applyProfit(productInfo);
                    productInfo.finalPrice = round(productInfo.finalPrice);
                    $('#finalPrice').html(addCommas(productInfo.finalPrice) + " LBP");




                    setTimeout(function(){$('#lira-lira-input').focus();}
                    ,300);
                    
                    
                                           
 	                                    if(x==0){ $('#switch-currency-base').click()}
                                          
                                                           
            }

            //       add comma to base price


             hhh = $('#dollar-lira-input').val()
            hhh = hhh

            $('#dollar-lira-input').val(addCommas(hhh));
            hhh = $('#lira-lira-input').val()
            hhh = hhh

            $('#lira-lira-input').val(addCommas(hhh));
           checkConflict();

            $('#type').html((productInfo.groupBool === '1') ? 'Group' :'Single Product');
            $('#groupBarcodes').html((productInfo.groupBool === '1') ? productInfo.groupBaracodes :'Empty');
            

            


            }else{
                data.unitPrice = "Conflict !";
            }

            }

            
            
            
            },
        
        
        
        
        
        error:  function (xhr , status , error) {@include("errors/error-xhr-modals")
             
         }
            
            
            
            
            
            });


         })
    )











































 function check22(){
                
                        if($("#dollar-lira-input").val()==""   &&  $("#dollar-dollar-input").val()!=""){
              $($('#dollar-lira-input').removeAttr('required'));
             $($('#dollar-dollar-input').attr('required',""))
             }  else if($("#dollar-lira-input").val()!=""   &&  $("#dollar-dollar-input").val()==""){
              $($('#dollar-dollar-input').removeAttr('required'));
             $($('#dollar-lira-input').attr('required',""))
             };
              
                }
                
window.setInterval(check22, 300);

    </script>