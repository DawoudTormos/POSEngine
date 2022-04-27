
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- Disabling browser cache-->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/search-bar.css') }}" rel="stylesheet">    --}}
    <link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
    {{--    <link href="{{ asset('css/animation.css') }}" rel="stylesheet">--}}
    @yield('css')

    <title>Document</title>
</head>
<body>
    

    @yield('section1')
    @yield('content') <!-- for auth/login.blade.php-->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/Public_jquery.min.js')}}"></script>

{{--<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script><script>

</script>--}}<script>

function addCommas(x , bool = false) {
 return String(x).replace(/^\d+(?=.|$)/, function (int) { return int.replace(/(?=(?:\d{3})+$)(?!^)/g, ","); });
  if(bool == true){

  }
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


function scrollParentToChild(parent, child) {

  // Where is the parent on page
  var parentRect = parent.getBoundingClientRect();
  // What can you see?
  var parentViewableArea = {
    height: parent.clientHeight,
    width: parent.clientWidth
  };

  // Where is the child
  var childRect = child.getBoundingClientRect();
  // Is the child viewable?
  var isViewable = (childRect.top >= parentRect.top) && (childRect.bottom <= parentRect.top + parentViewableArea.height);

  // if you can't see the child try to scroll parent
  if (!isViewable) {
        // Should we scroll using top or bottom? Find the smaller ABS adjustment
        const scrollTop = childRect.top - parentRect.top;
        const scrollBot = childRect.bottom - parentRect.bottom;
        if (Math.abs(scrollTop) < Math.abs(scrollBot)) {
            // we're near the top of the list
            parent.scrollTop += scrollTop;
        } else {
            // we're near the bottom of the list
            parent.scrollTop += scrollBot;
        }
  }

}



















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