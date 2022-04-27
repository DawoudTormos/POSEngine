
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- Disabling browser cache-->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    
  @yield('css')

    <title>Document</title>
</head>
<body>

@yield('content')


<script>function addCommas(x) {
 return String(x).replace(/^\d+(?=.|$)/, function (int) { return int.replace(/(?=(?:\d{3})+$)(?!^)/g, ","); });
 }
 
 function capitalizeFirstLetter(string) {
       return string.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });

}

function filterSpacesAndSpecialChars(string){
  return string.replace(/[^a-zA-Z0-9]/g, '')
}

</script>
@yield('js')

<script id="js-script">
$('#POS').children('a').attr("href","{{route('products-post')}}");
$('#Pricing').children('a').attr("href","{{route('changePrice')}}");
$('#Inventory').children('a').attr("href","{{route('editProductInfo')}}");


setTimeout(function(){
 	$("#csrf1Button").click();
}, 18000000);// 5 hours 


setTimeout(function(){
 	$("#csrf2Button").click();
}, 18900000);// 5 hours & 15 minutes



setTimeout(function(){
 	$("#csrf3Button").click();
}, 20400000);// 5 hours & 40 minutes











/////// taking backup Automartically 



setInterval(function(){ 



 	$.ajax({
       url : '{{route("takeBackup")}}', //PHP file to execute
       type : 'GET', //method used POST or GET
       //data : , // Parameters passed to the PHP file
       success : function(result){ // Has to be there !
           
       },

       error : function(result, statut, error){ // Handle errors

       }

    });



}, 600000);

</script>

</body>
</html>