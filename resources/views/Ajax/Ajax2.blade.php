
<script>
window.scrollTo(0, 150);
var animate1 = () => {$( ".invoice-price-right" )[0].animate({
          backgroundColor: "#fff"
        }, 200,'linear' );}
/*Enter trigger searchg configuration */
$($("#input1").keyup(function(event) {
    if (event.key === "Enter") {
        $("#button-search").click();
        $("#input1").val("");
        
        

    }
}))


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
         var qq1= '<tr id="';
         //id
         var qq1_2 = '"><td><span class="text-inverse">';
         // product name
         var qq2 = '</span><br></td><td class="text-center">';
         //baracode
         var qq3 = '</td><td class="text-center">';
         //price
         var qq4 = '</td><td id="qauntity" class="text-center">';
         //qauntity
         var qq4_2 = '</td><td id="subTotal"class="text-right">';
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
      var token =  $('input[name="_token"]').attr('value')
       var potato = {
        baracode: $('#input1').val(),
        _token : token,
        password:'the pass',
        username: "the username"
       }
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
            

            data = JSON.parse(data);
            data.sub = function () {
                return this.qauntity * this.unitPrice;
                };
            found = false;
            //if not found before
           
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
              
              $("#mainInvoice").append(qq1 + arr[i].id + qq1_2 + arr[i].productName + qq2 + arr[i].baracode + qq3 + arr[i].unitPrice + qq4 +arr[i].qauntity + qq4_2 +  arr[i].sub() + qq5); 
              i++;
                    }else{
                        
                 /*   $('#' + arr[foundi].id).children('#qauntity').html(arr[foundi].qauntity);
                     $('#' + arr[foundi].id).children('#subTotal').html(arr[foundi].sub());
*/
                    }
              
              //calculating the sub-totals
           /*     arr_total=[];
            for(let w of arr ){
                arr_total.push(w.unitPrice * w.qauntity); 
            }
            //calculating the total
            total = 0 ;
            for(let r of arr_total){
                total= total + r ; 
            }

            $('#total').html(total);

            */
            
        
            
            
            },
        
        
        
        
        
        error:  function (xhr , status , error) {
             var err = eval("(" + xhr.responseText + ")");
             $("#mainInvoice").append(prefix1 + err.Message + suffix1 );  ;
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
            $("#js-script").append(data); 
            },
        error: function (xhr , status , error) {
             var err = eval("(" + xhr.responseText + ")");
             alert(err.Message);
         }
            }); 
            x++;}
            animate1();
    })
    )

</script>
