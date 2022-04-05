<script>
if (typeof p1 === 'undefined') {
    
       var p1 = "<option value='";
       //category id
       var p2 = "'>";
       //category name
       var p3 ="</option>"
}



var getBrands = (bool1 = true)=> 
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
            if(bool1){
          configCatInSidebar(getAllProductsObject(setTimeout(()=>{fillAllProductsObject()},20)));
          }else{
              var setOldCatAndBrand = setInterval(function(){
                   $('#categories').val(tempCat);
                    $('#brands').val(tempBrand)

       if($('#brands').val() == tempBrand && $('#categories').val() == tempCat){
           clearInterval(setOldCatAndBrand);
           tempBrand = 0;
           tempCat = 0;
       }

    },250);
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




var getCategories = (bool1)=> 
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

          };
        getBrands(bool1);

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


 </script>