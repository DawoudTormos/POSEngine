
$($("#baracode-input").keydown(function(event) {
    if (event.keyCode === 13){
        event.preventDefault();
       
        $("#size-input").focus();
    }
}


));

$($("#name-input").keydown(function(event) {
    if (event.keyCode === 13){
        event.preventDefault();
       
        $("#baracode-input").focus();
    }
}


));

$($("#size-input").keydown(function(event) {
    if (event.keyCode === 13){
        event.preventDefault();
       

       if($("#dollar-dollar")[0].hasAttribute('disabled')){

          $("#lira-lira-input").focus(); 
          
       }else if ($("#lira-lira")[0].hasAttribute('disabled'))  {

            $("#dollar-dollar-input").focus();



               $($("#dollar-dollar-input").keydown(function(event) {
               if (event.keyCode === 13){
                event.preventDefault();
                $("#dollar-lira-input").focus();

                    
                }
           }
           
           
           ))
           
       }
        
    }
}


)

)



$($(document).on('submit', '#qq', function (event) {
     

     if(currency_base=="dollar"){


     if(conflict){
         event.preventDefault(); 
         alert("There is a conflict");
     }else{
           }

     }
     
     
     }) );





     
      var x =0 ;
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
        $("#dollar-lira-input").toggleClass("is-invalid",conflict);
           $("#dollar-dollar-input").toggleClass("is-invalid",conflict);
   }


  // calling each function once at first
  checkConflict();
   updateCurrency(x);
   changeCss(currency_base);
   $('#currency_base-input').val(currency_base);
   confgFields(currency_base);
    if($("#dollar-lira-input").val()!=""   &&  $("#dollar-dollar-input").val()==""){
             $($('#dollar-dollar-input').removeAttr('required'));
            $($('#dollar-lira-input').attr('required',""))
            }

$(//$.ready starts
   
       
   /////////////          the clickevent listener foe the switch
   $( "#switch-currency-base" ).click(function() {
 //alert('thats it');
   x++;
   updateCurrency(x);
   checkConflict();
       $('#currency_base-input').val(currency_base);

   changeCss(currency_base);
   confgFields(currency_base);
   $('#currency-base-input').val(currency_base);
  
})
///////


)/////$.ready ends


      // function for detecting the wanted field and making it required
   $(
           ////////changeevent for dollar-based input field
        $('#dollar-dollar-input').keyup(()=>{
             checkConflict();
        })
        );
        
        $($('#dollar-lira-input').keyup(()=>{
             checkConflict();
        }));
       $($('#lira-lira-input').keyup(()=>{
             checkConflict();
        }));
           
           
               
                
           



         

           /* $(
               $('#addProduct-submit').hover(function(){
                   if($("#dollar-dollar-input").val()!=""){
                       $($('#dollar-lira-input').removeAttr('required'));
                       $($('#dollar-dollar-input').attr('required',""))
                   }else if ($("#dollar-lira-input").val()!=""){
                       $($('#dollar-dollar-input').removeAttr('required'));
                       $($('#dollar-lira-input').attr('required',""))
                   }
               })*/










































  function check22(){
               
                       if($("#dollar-lira-input").val()==""   &&  $("#dollar-dollar-input").val()!=""){
             $($('#dollar-lira-input').removeAttr('required'));
            $($('#dollar-dollar-input').attr('required',""))
            }  else if($("#dollar-lira-input").val()!=""   &&  $("#dollar-dollar-input").val()==""){
             $($('#dollar-dollar-input').removeAttr('required'));
            $($('#dollar-lira-input').attr('required',""))
            };
             
               }
               
window.setInterval(check22, 800);





























//wholsale/final price

     

     $(//$.ready starts
   
       
   /////////////          the clickevent listener foe the switch
   $( "#switch2" ).click(function() {
 //alert('thats it'); 
   toggleFields()

}))
///////
$(

    $('#defaultProfit').click(()=>{

        if (document.getElementById('defaultProfit').checked) {
           $('#WholesaleFinal').val('wholesaleDefault');
             $('input[name="profit"]').attr('disabled',"");
       } else {
            

              $('#WholesaleFinal').val('wholesale');
              $('input[name="profit"]').removeAttr('disabled');
       }
      


})


////
)
var toggleFields=()=>{


if(document.getElementById('switch2').checked  ){
     $('input[name="profit"]').removeAttr('disabled');
   $('#defaultProfit').removeAttr('disabled');

    $('#WholesaleFinal').val('wholesale');
     
}  else{
   
  


   if (document.getElementById('defaultProfit').checked) {
            $('#defaultProfit').click();
       } else {
          
       }
       $('input[name="profit"]').attr('disabled',"");
        $('#WholesaleFinal').val('final');


    $('#defaultProfit').attr('disabled',"");
   
   } 

}



////to config what is disabled and what isn't depending on the hidden field

if($('#WholesaleFinal').val()=='wholesaleDefault' ){
   if (document.getElementById('switch2').checked != true) {
        document.getElementById('switch2').checked = true
    }
       if($('input[name="profit"]').is(':disabled') == true){
    // is disabled
     $('input[name="profit"]').removeAttr('disabled');
}
      
    if (document.getElementById('defaultProfit').checked == false) {
       
       if($('#defaultProfit').is(':disabled') == true){
           $('#defaultProfit').removeAttr('disabled');
        document.getElementById('defaultProfit').checked = true;
        }else{document.getElementById('defaultProfit').checked = true;}
    
    }
}else if($('#WholesaleFinal').val()=='wholesale' ){
   if (document.getElementById('switch2').checked != true) {
        document.getElementById('switch2').checked = true
    }
     if($('input[name="profit"]').is(':disabled') == true){
    // is disabled
     $('input[name="profit"]').removeAttr('disabled');
}
      if($('#defaultProfit').is(':disabled') == true){
           $('#defaultProfit').removeAttr('disabled');}

    if (document.getElementById('defaultProfit').checked == true) {
        $('#defaultProfit').click();
    }  
}else if($('#WholesaleFinal').val()=='final' ){
   if (document.getElementById('switch2').checked != false) {
        document.getElementById('switch2').checked = false
    }
     if($('input[name="profit"]').is(':disabled') == false){
    // is disabled
     $('input[name="profit"]').attr('disabled',"");
}
      
    if (document.getElementById('defaultProfit').checked == true) {
       if($('#defaultProfit').is(':disabled') == true){
           $('#defaultProfit').removeAttr('disabled');
        document.getElementById('defaultProfit').checked = false;
        $('#defaultProfit').attr('disabled',"");}
    }  
}






















//ajax to get categories



       var token = $("input[name='_token']").val();

       var p1 = "<option value='";
       //category id
       var p2 = "'>";
       //category name
       var p3 ="</option>"

 var getCategories = ()=> 
 {$.ajax({
       url: "{{route('getCategories')}}"  ,
       type: "Post",
       async: true,
       data: {_token : token},
       success: function (data) {
           $("#categories").html("");
           $("#categories").append('<option value="" > </option>');
           data = JSON.parse(data);
           window.catIDs = data[0];
           window.catNames = data[1];

          if(catIDs.length != catNames.length){
              alert("There is a server or database error");
          }else{
              for( let ll = 0; ll < catIDs.length ; ll++){
                  $("#categories").append(p1 + catIDs[ll] + p2 + catNames[ll] + p3)
              }

          }
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



 getCategories();



var token = $("input[name='_token']").val();

       var p1 = "<option value='";
       //brand id
       var p2 = "'>";
       //brand name
       var p3 ="</option>"


//getting brands
 var getBrands = ()=> 
 {$.ajax({
       url: "{{route('getBrands')}}"  ,
       type: "Post",
       async: true,
       data: {_token : token},
       success: function (data) {
           $("#brands").html("");
           
           data = JSON.parse(data);
           window.brandIDs = data[0];
           window.brandNames = data[1];

          if(brandIDs.length != brandNames.length){
              document.write('There is a server error!!')
              alert("Error. Please contact the developer");
          }else{
              for( let ll = 0; ll < brandIDs.length ; ll++){
                  $("#brands").append(p1 + brandIDs[ll] + p2 + brandNames[ll] + p3)
              }

          }
       },
       error: function (xhr, exception) {
           var msg = "";
           alert("Error. Please contact the developer");
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



 getBrands();











