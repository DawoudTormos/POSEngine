<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   @yield('css')

    <title>Document</title>
</head>
<body>
    

    @yield('section1')
    @yield('content') <!-- for auth/login.blade.php-->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>

{{--<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script><script>

</script>--}}

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
@yield('javascript')
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


</script>
</body>
</html>