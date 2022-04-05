if (typeof p1 === 'undefined') {
    
       var p1 = "<option value='";
       //category id
       var p2 = "'>";
       //category name
       var p3 ="</option>"
}


var getCategories = ()=> 
 {$.ajax({
       url: "{{route('getCategories')}}"  ,
       type: "Post",
       async: true,
       data: {_token : token},
       success: function (data) {
           $("#categories").html("");
           $("#categories").append('<option value="" >Choose a category</option>');
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