
    
    
    <form action="{{route('test')}}" id="qq"> <div style="" id="card2" class="my-4 pb-4 d-none card col-12">
   
    <h1 class="m-3 mb-1 ms-4  text-center display-6"style="text-transform:capitalize;" id="productName">  </h1>
     
   
    <div id="currency-base-row" class="row m-2">
   
    
    
    {{-- first element in the row --}}
       <div id="dollar-fields" class="pb-4 d-flex flex-column justify-content-between  col-12 col-md-4  ">
         <h4 class="align-self-start flex-grow-0 my-3 fw-bold">Dollar-Based</h4> 
         <div id="Dollar-Based-Inputs"class="flex-grow-1 d-flex justify-content-between flex-column">
    
          <fieldset id="dollar-dollar" disabled>
          <div class=" mb-5 form-floating">    
            <input type="number" step="0.001" name="dollar-dollar"class="form-control " id="dollar-dollar-input"  placeholder="necessary for floating" required>
             <label for="validationServer02" class="form-label">Dollar</label>
             <div class="valid-feedback">
              Looks good!
            </div>
          </div></fieldset>
    
    
          <fieldset  id="dollar-lira" disabled>
           <div class="  form-floating">    
            <input type="text" name="dollar-lira"class="form-control " id="dollar-lira-input"  placeholder="necessary for floating" required>
             <label for="validationServer02" class="form-label">LBP</label>
             <div id="dollar-lira-feedback" class="invalid-feedback">
              Looks good!
            </div>
          </div></fieldset>
    
       
    
         
         
         
          
          </div>
    
       </div>
    
    
    
    
    {{-- second element in the row --}}
    <div class="col-12 col-md-4 my-5 d-flex justify-content-center align-items-center">
            <label  class=" mt-2 switch fs-4">
        <input id="switch-currency-base" type="checkbox">
        <span class="slider"></span>
        <br></label>
    </div>
    
    
    
    {{-- third element in the row --}}
    <div id="lira-fields" class=" mb-4 mb-md-0 d-flex flex-column justify-content-between col-12 col-md-4">
    
    
    
         <h4 class="align-self-start flex-grow-0 my-3 fw-bold">LBP-Based</h4> 
         <div id="Dollar-Based-Inputs"class="flex-grow-1 d-flex justify-content-between flex-column">
    
          <fieldset id="lira-lira" disabled="">
          <div class=" mb-5 form-floating">    
            <input type="text" class="form-control " name="lira-lira" id="lira-lira-input"  placeholder="necessary for floating" required>
             <label for="validationServer02" class="form-label">LBP</label>
             <div id="lira-lira-feedback" class="invalid-feedback">
              Looks good!
            </div>
          </div></fieldset></div>
    
    
    
    
    
    </div>
    
         <input type="submit" style="display:none;">
         
  
    
   
          </div>
     
   <table style="width:auto;" class="table table-striped m-5">
  <thead style="border-bottom:2px solid #000">
    <tr>
      
      <th scope="col">Property</th>
      <th style="font-weight: 900 !important;font-size: 16px;"scope="col">
                      Value</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">Type</th>
      <td ><span id="type"></span></td>
      
    </tr>
    <tr>
      <th scope="row">Group's Barcodes</th>
      <td ><span id="groupBarcodes"></span></td>
      
    </tr>
    <tr>
      <th scope="row">Barcode</th>
      <td ><span id="baracode"></span></td>
      
    </tr>
    <tr>
      <th scope="row">Currency Base</th>
      <td ><span id="currencyBase"></span></td>
      
    </tr>
    <tr id="beforeDollarRate">
      <th scope="row">Base Price</th>
            <td ><span id="basePrice"></span></td>

      
    </tr>
    <tr id="dollarRateRow">
      <th scope="row">Current Dollar Rate </th>
      <td ><span id="dollarRate"></span></td>
     
    </tr>
    <tr>
      <th scope="row">Profit Type</th>
      <td ><span id="profitType"></span></td>
     
    </tr>
    <tr>
      <th scope="row">Profit Percentage</th>
      <td ><span id="profitPercentage"></span></td>
     
    </tr>
    <tr class="table-info">
      <th scope="row">Final Price</th>
      <td ><span id="finalPrice"></span></td>
     
    </tr>
    <tr>
      <th scope="row">Size </th>
      <td ><span id="size"></span></td>
     
    </tr>
     <tr>
      <th scope="row">Category </th>
      <td ><span id="category"></span></td>
     
    </tr>
     <tr>
      <th scope="row">Brand </th>
      <td ><span id="brand"></span></td>
     
    </tr>
  </tbody>
</table>
   
    </div>
    
    
    </form> 




















{{--popup--}}

<div id="popup" style="margin-top:220px;display:none;"  class=" text-center fs-4 py-2 alert alert-danger" role="alert">
 Barcode Not Found!
</div>


     
