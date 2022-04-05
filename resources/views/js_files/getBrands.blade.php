if (typeof p1 === 'undefined') {
    
       var p1 = "<option value='";
       //category id
       var p2 = "'>";
       //category name
       var p3 ="</option>"
}

var getBrands = ()=> 
 {$.ajax({
       url: "{{route('getBrands')}}"  ,
       type: "Post",
       async: true,
       data: {_token : token},
       success: function (data) {
           $("#brands").html("");
            $("#brands").append('<option value="" >Choose a brand </option>');
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
           
           var err = eval("(" + xhr.responseText + ")");
              //alert("error:" + err.message+"\n"+"status:"+status + "\n"+error);
              $("#xhrBody").html("Error message:<span class='text-danger'> \"" + err.message+"\"</span><br>"+"status: "+status + " "+error+"<span class='text-danger'><br><br>PLEASE Contact The Developer!</span>");
              if(err.message == "CSRF token mismatch."){
                  $("#xhrBody").append("<br><br><span class='text-success'>Probable Solution : refresh the page and repeat the action you did before getting the error</span>");
              }
              $("#xhrButton").click();


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
