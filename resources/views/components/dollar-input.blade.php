

<div class="container px-4 mt-4">

<div class="row justify-content-around">





<div class="col-12  mx-4 px-0 my-2 card ">

  <div class="  card-header">
  <div class="h3 my-0 text-center mx-auto">
    General Info</div>
  </div>
  <ul class="list-group list-group-flush">
  <li class="ps-2 list-group-item"> 
    <div class="h4 my-0">Current Dollar-Rate:<span id="dollarPrice" class="px-1"> {{ (int)$dollarRate }} </span>LBP</div>
    
    </li>

    <li class="ps-2 list-group-item"> 
    <div class="h4 my-0">Current Default Profit:<span id="defaultProfitDiv" class="px-1"> {{ (int)$defaultProfit }} </span>%</div>
    
    </li>
    
    <li id="dollarPrice" class="ps-2 list-group-item"><div class="h4 ps-0 my-0">Number of Products: <span class=" px-1 " id="NbProducts">{{ $count }}</span></div></li>
    
    <li class="list-group-item">A third item</li>
  </ul>
</div>




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