
<script>


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

         var x=0;
          var Info={};
         
$(
    $(document).on('submit', '#dollarRateForm', function (event) {
     

      
     
     event.preventDefault(); 
     
     
      var token =  $('input[name="_token"]').attr('value')
       var potato = {
        DollarRate: $('input[name="DollarRate"]').val(),
        _token : token,
       
       }
     // LOOK AT ME! BETWEEN HERE AND 
   
        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Csrf-Token', token);
            }
        });
    // HERE   // don't remove
     
     $.ajax({
        url: '/change-dollar-post',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  
            Info = JSON.parse(data);
            $('#dollarPrice').html(addCommas(Info['dollarRate']));
              $('#NbProducts').html(Info['count']);
               
           
            
            
            },
        
        
        
        
        
        error:  function (xhr , status , error) {@include("errors/error-xhr-modals")
              
         }
            });
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
             console.log(err.message);
         }
            }); 
            ;}
          
    })
    )





$(
    $(document).on('submit', '#defaultProfitForm', function (event) {
     

      
     
     event.preventDefault(); 
     
     
      var token =  $('input[name="_token"]').attr('value')
       var potato = {
        defaultProfit: $('input[name="defaultProfit"]').val(),
        _token : token,
       
       }
     // LOOK AT ME! BETWEEN HERE AND 
   
        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Csrf-Token', token);
            }
        });
    // HERE   // don't remove
     
     $.ajax({
        url: '{{route("change-defaultProfit-post")}}',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  
            Info = JSON.parse(data);
            $('#defaultProfitDiv').html(addCommas(Info['defaultProfit']));
              $('#NbProducts').html(Info['count']);
               
           
            
            
            },
        
        
        
        
        
        error:  function (xhr , status , error) {@include("errors/error-xhr-modals")
              
         }
            });
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
             console.log(err.message);
         }
            }); 
            ;}
          
    })
    )
</script>
