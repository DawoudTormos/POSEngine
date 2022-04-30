<script>
$(
    $(document).on('submit', '#addCategoryForm', function (event) {
     

      
     
     event.preventDefault(); 
     
     if(   catNames.includes($('input[name="addCategory"]').val()) == true  ){
         $("#errorModal #errorModalBody").html("The category name you entered already exits.");
         $("#errorModalButton").click();
         return 0;
     }else if ($('input[name="addCategory"]').val() == ''|| $('input[name="addCategory"]').val() == 0){
         $("#errorModal #errorModalBody").html("The category name is empty");
         $("#errorModalButton").click();
         return 0;
     }
     
      var token =  $('input[name="_token"]').attr('value')
       var potato = {
        newCategory: $('input[name="addCategory"]').val(),
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
        url: '{{ route("addCategoryOrBrand")}}',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  
          
               $('input[name="addCategory"]').val("");
               updateArrays()
           
            
            
            },
        
        
        
        
        
        error:  function (xhr , status , error) {
            @include("errors/error-xhr-modals")
              
         }
            });
    })

)







$(
    $(document).on('submit', '#addBrandForm', function (event) {
     

      
     
     event.preventDefault(); 
     
     if(   brandNames.includes($('input[name="addBrand"]').val()) == true  ){
         $("#errorModal #errorModalBody").html("The brand name you entered already exits.");
         $("#errorModalButton").click();
         return 0;
     }else if ($('input[name="addBrand"]').val() == ''|| $('input[name="addBrand"]').val() == 0){
         $("#errorModal #errorModalBody").html("The brand name is empty");
         $("#errorModalButton").click();
         return 0;
     }
     
      var token =  $('input[name="_token"]').attr('value')
       var potato = {
        newBrand: $('input[name="addBrand"]').val(),
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
        url: '{{ route("addCategoryOrBrand")}}',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  
          
               $('input[name="addBrand"]').val("");
               updateArrays()
           
            
            
            },
        
        
        
        
        
        error:  function (xhr , status , error) {
            @include("errors/error-xhr-modals")
              
         }
            });
    })

)






</script>