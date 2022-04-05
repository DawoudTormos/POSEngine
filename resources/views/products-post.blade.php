
@extends('layouts.layout')

@section('css')
<link href="{{ asset('css/floatPauseButton.css') }}" rel="stylesheet">
<!-- the above floatPauseButton.css contains the .dot for indicating a product is in dollar -->
@endsection

@section("section1")

    
<!-- post "</h1> <script>alert('200');</script> <h1>" in the serach bar to do a simple hack -->
@include('components.header')

@include('tools.check_method')


<!--will be redirected -->

<!--AJAX live requests no reload  -->


@include('components.invoice')
@include('components.bootstrapModals')
@endsection




@section('javascript')

@include('Ajax.Ajax')

<script>

  @php
      echo "var globalProfit =".$globalProfit.";" ;
  @endphp 








jQuery.uaMatch = function( ua ) {
    ua = ua.toLowerCase();
    var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
        /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
        /(msie) ([\w.]+)/.exec( ua ) ||
        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) || [];
    return {
        browser: match[ 1 ] || "",
        version: match[ 2 ] || "0"
    };
};
if ( !jQuery.browser ) {
    var 
    matched = jQuery.uaMatch( navigator.userAgent ),
    browser = {};
    if ( matched.browser ) {
        browser[ matched.browser ] = true;
        browser.version = matched.version;
    }
    // Chrome is Webkit, but Webkit is also Safari.
    if ( browser.chrome ) {
        browser.webkit = true;
    } else if ( browser.webkit ) {
        browser.safari = true;
    }
    jQuery.browser = browser;
}



 $.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));



 if( $.browser.device == true){

 }else{
      $(".table-invoice thead tr").append('<th width="17px"></th>');
 }


















/// update dollarRate

{{ "var dollarRate=".$dollarRate.';;'}}





 var clear = ( )=> {
 arr=[];

//             calculate the total which should be zero now
 arr_total=[];
            for(let w of arr ){
                arr_total.push(w.sub()); 
            }
            //calculating the total
            total = 0 ;
            for(let r of arr_total){
                total= total + r ; 
            }
////// then update the html
$('#total').html(total);
$('#mainInvoice').empty();
i=0;
$('#input1').focus();

 
/////////




 }



// change sub-total to sub total on breakpoint
$(window).resize(function() {
    if ($(window).width() < 576) {
        $(".table-invoice th:nth-child(5)").html('Sub<br>Total');
    } else {
        
    }



    if ($(window).width() >= 576) {
        $(".table-invoice th:nth-child(5)").html('Sub-Total');
    } else {
        
    }
});
$(window).resize();


$('#clear').click(function(){clear()});

@include('js_files.floatPauseButton')
//$($('#floatButton').click());
$($('#input1').focus())
//makingbthe invoice-price same-width as the invoice


 /* let lastHeight = $("#invoice").height();
let lastWidth = $("#invoice").width();
let uu = $("#invoice").css('margin-right');
      $('#invoice_price').css({"width": lastWidth*1.03});
      $('#invoice_price').css({"margin-right": uu});

function checkHeightChange() {
	newHeight = $("#invoice").height();
	newWidth = $("#invoice").width();

	if (lastHeight != newHeight || lastWidth != newWidth) {
		console.log("The element was resized");
      
      $('#invoice_price').css({"width": newWidth*1.03})
		// assign the new dimensions
		lastHeight = newHeight;
		lastWidth = newWidth;

	}
}

$(document).ready(window.onresize = function(){ checkHeightChange()})
*/

/// scroll the searchbar to view to the top
 document.getElementById("searchbar").scrollIntoView(true);
$("title").html("POS");
</script>

@endsection