
<script>

window.scrollTo(0,150);

var animate1 = () => {$( ".invoice-price-right" )[0].animate({
          backgroundColor: "#fff"
        }, 200,'linear' );}

        var animate11 = (par) => {$( par )[0].animate({
          backgroundColor: "#888 "
        }, 150,'swing' );}
/*Enter trigger searchg configuration */
$($("#input1").keyup(function(event) {
    if (event.key === "Enter") {
        $("#button-search").click();
        $("#input1").val("");
        
        

    }
}))






////////// rounding function 


var round = (par)=>{
    par = par/250;
    par = Math.ceil(par);
    par = par*250 ;
    return par ;
}









///end function

 /*function getMessage() {
            $.ajax({
               type:'POST',
               url:'/getProduct-post',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#demo").html(data);
               }
            });
         }*/
         var qq1= '<tr  width="100%" id="';
         //id
         var qq1_2 = '"><td><span width="40%"class="text-inverse product_name">';
         // product name
         var qq2 = '</span></td><td width="15%" class=" removeATmd text-center">';
         //baracode
         var qq3 = '</td><td width="15%" class="text-center">';
         //price
         var qq4 = '</td><td width="10%" id="qauntity" class="text-center">';
         //qauntity
         var qq4_2 = '</td><td width="20%" id="subTotal"class="text-center">';
          //sub total
         var qq5 = '</td></tr>';
        
         var x = 0;
         var i = 0 ; 
         var foundi ;// productsArrayIndex
         var arr= [];
         var found = false ;
         var arr_total = [];
         var total = 0 ;
      
         
$(
    $(document).on('submit', '#search_form', function (event) {
    
     event.preventDefault(); 

     if(filterSpacesAndSpecialChars($('#input1').val()) == "" || $('#input1').val() == "NULL"){
         
         console.log("Cannot send empty baracode post request");
               $('#searchResult div').html("Empty String :-\\");
                $('#searchResult div').addClass('text-warning');
            $('#searchResult div').removeClass('text-danger');
            $('#searchResult div').removeClass('text-success');
         return false;
     }
      var token =  $('input[name="_token"]').attr('value')
      var barcode = $('#input1').val();
       var potato = {
        baracode: filterSpacesAndSpecialChars(barcode),
        _token : token,
       
       }
       console.log(potato.baracode)
     // LOOK AT ME! BETWEEN HERE AND
   
        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Csrf-Token', token);
            }
        });
    // HERE
     
     $.ajax({
        url: '/getProduct-post',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  
            
            if(data == "Not Found"){
                $('#searchResult div').html("Not Found :-(");
                $('#searchResult div').addClass('text-danger');
            $('#searchResult div').removeClass('text-success');
            $('#searchResult div').removeClass('text-warning');

            }else{
                 $('#searchResult div').html("Found!");
                $('#searchResult div').addClass('text-success');
            $('#searchResult div').removeClass('text-danger');
            $('#searchResult div').removeClass('text-warning');
            data = JSON.parse(data);
            
            animate1();
            

            







            // Determining the unit price
            if( data.unitPrice != "conflict"    )
            {
                if(data.profitType == "special"){
                    data.unitPrice = data.unitPrice * ( 1 + (data.profitPercent/100));
                }if(data.profitType == "global"){
                    data.unitPrice = data.unitPrice * ( 1 + (globalProfit/100));
                } 


                if(data.currencyBase=="dollar"){

            data.unitPrice = data.unitPrice * dollarRate ;
            data.unitPrice = round(data.unitPrice);


            }else{
                     data.unitPrice = round(data.unitPrice);
            }



            





            }else{
                data.unitPrice = "Conflict !";
            }








            data.sub = function () {
                if(this.unitPrice == "Conflict !"){
                    return 0 ;
                    
                
                }else{
                    return this.qauntity * this.unitPrice;
                }
                };
            found = false;
            //if not found before
            $("#lastScannedItem").html(data.productName);
            $("#lastScannedPrice").html(addCommas(data.unitPrice.toString()));
                   for(var d = 0; d < arr.length; d++){
                                            	
             if (arr[d].id == data.id) {
                 arr[d].qauntity++;
                 foundi = d ;
             	 found = true ;
             }else{

             }
             }
             if(!found){
              arr.push(data);
              arr[i].qauntity = 1;
              
              $("#mainInvoice").prepend(qq1 + arr[i].id + qq1_2 + arr[i].productName + qq2 + arr[i].baracode + qq3 + addCommas(arr[i].unitPrice) + qq4 +arr[i].qauntity + qq4_2 +  addCommas(arr[i].sub()) + qq5);
               
                 if(arr[i].currencyBase=="dollar"){
                     $('#' + arr[i].id +" span.product_name").prepend("<span class='dot-green'></span>&nbsp; ");
                 }else{
                       $('#' + arr[i].id +" span.product_name").prepend("<span class='dot-blue'></span>&nbsp; ");
                   
                 }
                animate11("#" + arr[i].id);

              
              scrollParentToChild(document.getElementById("mainInvoice"), document.getElementById(arr[i].id)) 
                i++;
                    }else{
                        
                    $('#' + arr[foundi].id).children('#qauntity').html(arr[foundi].qauntity);
                     $('#' + arr[foundi].id).children('#subTotal').html(addCommas(arr[foundi].sub()));
                     animate11("#" + arr[foundi].id);
                     
                    scrollParentToChild(document.getElementById("mainInvoice"), document.getElementById(arr[foundi].id)) 

                    }
              
              //calculating the sub-totals
                arr_total=[];
            for(let w of arr ){
                arr_total.push(w.sub()); 
            }
            //calculating the total
            total = 0 ;
            for(let r of arr_total){
                total= total + r ; 
            }
            
            $('#total').html(addCommas(total));}

            
            
        
            
            
            },
        
        
        
        
        
        error:  function (xhr , status , error) {
        @include("errors/error-xhr-modals")
         }
            });
                                                // make an error backup 
            if (x==0) {
             $.ajax({
        url: '/consoleLog-post',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  
            console.log('{"baracode":"123","_token":"1HSu0kIQQqxPvFZmppcrMnyQD1tfQwqjtvufoJQ3"}');
            },
        error: function (xhr , status , error) {
            
             var err = eval("(" + xhr.responseText + ")");
             alert(err.message);
         }
            }); 
            x++;}
            
    })
    )

</script>
