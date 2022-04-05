<script>

$("#name-input").focus();
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



$($("#dollar-dollar").keydown(function(event) {
    if (event.keyCode === 13){
        event.preventDefault();
       
        $("input[name='profit']").focus();
    }
}


));


$($("#dollar-lira").keydown(function(event) {
    if (event.keyCode === 13){
        event.preventDefault();
       
        $("input[name='profit']").focus();
    }
}


));



$($("input[name='profit']").keydown(function(event) {
    if (event.keyCode === 13){
        event.preventDefault();
       
        
    }
}


));


$($("#lira-lira").keydown(function(event) {
    if (event.keyCode === 13){
        event.preventDefault();
       
        $("input[name='profit']").focus();
    }
}


));








var conflict2 = false

$($(document).on('submit', '#qq', function (event) {
     

     if(currency_base=="dollar"){


     if(conflict || conflict2){
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
        $("#dollar-dollar-input").toggleClass("is-invalid",conflict);
           $("#dollar-lira-input").toggleClass("is-invalid",(conflict || conflict2));
           
            
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
   
  
})
///////


)/////$.ready ends
var hhh;
var hhh2

      // function for detecting the wanted field and making it required
   $(
           ////////changeevent for dollar-based input field
        $('#dollar-dollar-input').keyup(()=>{
             checkConflict();
        })
        );
        
        $($('#dollar-lira-input').keyup(()=>{
             
            hhh = $('#dollar-lira-input').val()
            hhh = hhh
            
            hhh2 = hhh.replace(/[^0-9,]/g, '')
           
            if(hhh2 != hhh ){
           
            $("#dollar-lira-feedback").html("Enter Only Numbers! Non-numeric characters will be removed ");conflict2=true;
            }else{ $("#dollar-lira-feedback").html(""); conflict2=false}
           hhh = hhh2.replace(/,/g, "") 
            $('#dollar-lira-input').val(addCommas(hhh));
           checkConflict();


        }));
       $($('#lira-lira-input').keyup(()=>{
             checkConflict();
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


if(document.getElementById('switch2').checked /* it becomes checked after the click event*/ ){
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



////to config what is disabled and what isn't depending on the hidden field(currency-base)
var configProfitInfo = ()=>{
if($('#WholesaleFinal').val()=='wholesaleDefault' ){
   if (document.getElementById('switch2').checked != true) {
        document.getElementById('switch2').checked = true
    }
       if($('input[name="profit"]').is(':disabled') == true){
    // is disabled
    
}else{ $('input[name="profit"]').attr('disabled',"");}
      
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
           $('#defaultProfit').removeAttr('disabled');
           
           } 

    if (document.getElementById('defaultProfit').checked != false) {
       // $('#defaultProfit').removeAttr('disabled');
       console.log($('#defaultProfit').click());
       // don't use this cause it will disable input[name="profit"]
         document.getElementById('defaultProfit').checked = false;
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
        $('#defaultProfit').attr('disabled',"");

        }else if($('#defaultProfit').is(':disabled') == false){

            document.getElementById('defaultProfit').checked = false;
        $('#defaultProfit').attr('disabled',"");

        }
    } else if(document.getElementById('defaultProfit').checked == false){
        if($('#defaultProfit').is(':disabled') == false){
                $('#defaultProfit').attr('disabled', '')
        }
    }




}

}




configProfitInfo()















//ajax to get categories



       var token = $("input[name='_token']").val();


 




///Adding a group of baracodes when group-bool = true
var groupBaracodes = [];

var indexw ;
var bar ;

var tt1 = '<tr id="';
//Baracode
var tt2 = '"><td>';
//Baracode
var tt3 = '<button class=" btn-delete-custom btn btn-danger" onclick="deleteGroupBaracode(';
//Baracode
var tt4 = ')">delete</button></td></tr>';

$("#switch3").click(()=>{
if($("#group-bool").val() == "false" ||$("#group-bool").val() == "False"){$("#group-bool").val("0") }
else if ($("#group-bool").val() == "true" || $("#group-bool").val() == "True"){$("#group-bool").val("1")}
if($("#group-bool").val() == 0){
   // $($('#dollar-lira').removeAttr('disabled'));
       $($('#baracode-input').attr('disabled',""))
       //$('#baracode-input').val("")
       $("#group-bool").val(1)
       $("#switch3").prop('checked', true);
         $("#group-baracodes").val(peppery);
       if(page == "editProductInfo"){
           currentProductInfo['group_bool'] = 1;
           currentProductInfo['baracode'] = "NULL" ;
            currentProductInfo['group_baracodes'] = peppery;
          
       }
}else{
    //$('#baracode-input').val("")
  $($('#baracode-input').removeAttr('disabled'))
       $("#group-bool").val(0)
       $("#switch3").prop('checked', false);

       $("#group-baracodes").val('');
      // $("#group-baracodes-table table tbody").empty()
        if(page == "editProductInfo"){
           currentProductInfo['group_bool'] = 0;
           //currentProductInfo['baracode'] = "" ;
           currentProductInfo['group_baracodes'] = "";

            
       }

}

$("#group-baracode-input").toggleClass('d-none');
$("#group-baracodes-table").toggleClass('d-none');
$("#add-btn").toggleClass('d-none');

}
)


$("#add-btn").click(()=>{
//if (currentProductInfo == undefined ){
//return 0;
//}
    if($("#group-baracode-input").val() !=""){
    bar = $("#group-baracode-input").val();
    groupBaracodes.push(bar);
    groupBaracodes = [...new Set(groupBaracodes)];
    $("#group-baracodes-table table tbody").append(tt1 + bar + tt2 + bar + tt3 + bar + tt4)
    updateGroupBaracodes()
    }
    $("#group-baracode-input").val('');
    $("#group-baracode-input").focus()
    
})

$($("#group-baracode-input").keydown(function(event) {
    if (event.keyCode === 13){
        event.preventDefault();
        $("#add-btn").click();
       
        
    }
}))



var deleteGroupBaracode = (baracode)=>{
    $("#" + baracode.toString()).remove()
    indexw = groupBaracodes.indexOf(baracode.toString())
    groupBaracodes.splice(indexw , 1)
    updateGroupBaracodes()
}

var deleteAllGroupsBaracode = ()=>{
    $("#group-baracodes-table table tbody").empty();
   
    groupBaracodes = [];
    updateGroupBaracodes()
}

var peppery = '';
var updateGroupBaracodes = ()=>{
    peppery = ''
    groupBaracodes.forEach((itemyy)=>{
        if(peppery!=""){peppery += ",";}
        peppery += itemyy;
        
    })

    
    $("#group-baracodes").val(peppery);

     if(page == "editProductInfo"){
           currentProductInfo['group_baracodes'] = peppery
       }
    
}


var token = $("input[name='_token']").val();

       var p1 = "<option value='";
       //brand id
       var p2 = "'>";
       //brand name
       var p3 ="</option>"


//getting brands
 













</script>