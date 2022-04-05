
    @extends('layouts.layout')

@section('content')
<div class="container px-4 mt-4">

<div class="row justify-content-around">





<div class=" col-12 col-lg-5   my-2  align-self-center mx-4 card d-flex flex-column   justify-content-around align-items-center">
     
     <div class="h3 my-3">Update Dollar Rate</div>
     
     <form method="POST"  style="top:-2px;" class="  mb-4 mx-auto main-search-input-wrap clearfix" id="dollarRateForm" action="{{route('ChangeDollar')}}{{--usless now with event.preventDefault.;--}}" >
         <div class="main-search-input fl-wrap">
             <div class="main-search-input-item"> 
              @csrf 
               <input type="text" name="DollarRate" id="DollarRate"  accesskey="w"  placeholder="Enter New Rate"> 
                </div> 
               <input class="main-search-button" name="submit" id="search-button"  type="submit" >
         </div>
     </form>
</div>


<div class=" col-12 col-lg-5   my-2  align-self-center mx-4 card d-flex flex-column   justify-content-around align-items-center">
     
     <div class="h3 my-3">Update Default Profit</div>
     
     <form method="POST"  style="top:-2px;" class="  mb-4 mx-auto main-search-input-wrap clearfix" id="defaultProfitForm" action="{{route('ChangeDollar')}}{{--usless now with event.preventDefault.;--}}" >
         <div class="main-search-input fl-wrap">
             <div class="main-search-input-item"> 
              @csrf 
               <input type="text" name="defaultProfit" id="defaultProfit"  accesskey="w"  placeholder="Enter New Percentage"> 
                </div> 
               <input class="main-search-button" name="submit" id="search-button"  type="submit" >
         </div>
     </form>
</div>









</div>

 </div>




@endsection
@php


@endphp