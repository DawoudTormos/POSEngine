  <div class="container">

   
   
     <div class="row searchbar-container justify-content-between">
     <div  id="searchbar" style="padding:0;m" class="d-flex justify-content-center col-12 col-md-6 ">
 

   <form style="margin:0;" method="GET" class="main-search-input-wrap clearfix" id="search_form" action="{{route('products-post')}}{{--usless now with event.preventDefault.;--}}" >
     <div class="main-search-input fl-wrap">
         <div class="main-search-input-item"> 
          @csrf 
           <input type="text" name="name" id="input1"  accesskey="w" value="" placeholder="Enter Baracode..."> 
            </div> 
           <input class="main-search-button" name="submit" value="Get Product" id="search-button"  type="submit" >
     </div>
 </form>
</div>


<div id="searchResult" class="col-md-4 d-flex justify-content-end align-items-center">
<div class="h1 m-0 fw-bold">
</div>
</div>






</div>






    <div class="row">
   <div class=" col-md-12">
      <div id="invoice" class="invoice">
         <!-- begin invoice-company -->
         <div class=" row invoice-company text-inverse f-w-600">
        <div class="col-12 col-md-6">
            <h1 id="invoice-title" >Tormos Market</h1>
        </div>
            <span class=" col-12 col-md-6 mt-1 d-flex justify-content-start justify-content-md-end hidden-print">
            <button href="javascript:;" class="btn btn-sm btn-white mx-1 me-0 p-l-5"><i class="fa fa-file t-plus-1 text-warning fa-fw fa-lg"></i> Export as PDF</button>
            <button href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white mx-1 me-0 p-l-5"><i class="fa fa-print text-primary t-plus-1 fa-fw fa-lg"></i> Print</button>
            <button id="clear" accesskey="z" onclick="clear()" class="btn btn-sm btn-white mx-1 me-0 p-l-5"><i class="fa fa-broom text-danger t-plus-1 fa-fw fa-lg"></i> Clear</button>
            </span>
            
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
        {{-- <div class="invoice-header">
            <div class="invoice-from">
               <small>from</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Twitter, Inc.</strong><br>
                  Street Address<br>
                  City, Zip Code<br>
                  Phone: (123) 456-7890<br>
                  Fax: (123) 456-7890
               </address>
            </div>
            <div class="invoice-to">
               <small>to</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Company Name</strong><br>
                  Street Address<br>
                  City, Zip Code<br>
                  Phone: (123) 456-7890<br>
                  Fax: (123) 456-7890
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice / July period</small>
               <div class="date text-inverse m-t-5">August 3,2012</div>
               <div class="invoice-detail">
                  #0000123DSS<br>
                  Services Product
               </div>
            </div>
         </div>--}}
         <!-- end invoice-header -->






<!-- search bar starts here  -->
     
 
<!-- search bar ends here  -->










         <!-- begin invoice-content -->
               
         <div class="invoice-content">




            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table  class="table  table-hover table-invoice">
                  <thead>
                     <tr style="display:block;padding-right:17px;">
                        <th width="40%">PRODUCT NAME </th>
                        <th class="text-center removeATmd" width="15%">Baracode</th>
                        <th class="text-center" width="15%">Unit Price</th>
                        <th class="text-center" width="10%">Qauntity</th>
                        <th class="text-center" width="20%">Sub-Total</th>
                         {{--for scrollbar--}}
                       {{-- <th class="text-right" width="20%">Sub-Total</th>--}}
                     </tr>
                  </thead>
                  <tbody id="mainInvoice">
                  



                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->




            <!-- begin invoice-price -->
            <div id="invoice_price" class="invoice-price">





               <div class="invoice-price-left">
                  <small style="position:absolute;top:7px;left:12px;">Last Scanned Item</small>
               </div>

               <div style="position:absolute;top:calc(50% - 20px);left:10%;text-transform:capitalize;"
                  class="h1"><span id="lastScannedItem"> master</span> 
                <div style="position:absolute;top:70px;left:0;text-transform:capitalize;"
                  id="lastScannedPrice" class="h1">19000</div>  </div>

              




               <div class="invoice-price-right" >
                  <small>TOTAL</small> <span class="f-w-600">LBP </span><span id="total" style="font-size:36px" class="f-w-600">0</span>
               </div>




            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->



      <div id="bottom">
         <!-- begin invoice-note -->
         <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
         </div>
         <!-- end invoice-note -->


         <!-- begin invoice-footer -->
         {{--<div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center">
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> tormops@tormos.gmail.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:0125205443565</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> potato@gmail.com</span>
            </p>
         </div>--}}
         
         <!-- end invoice-footer -->
</div>




      </div>
   </div>
</div></div>

<a onclick="" id="floatButton" class="float">
<i accesskey="p" id="floatButton-i" class="fa fa-pause my-float" title="Alt+P"></i>
</a>
{{--
@php
    echo $request->path() ;
@endphp
--}}
<div id="demo"> 

</div>