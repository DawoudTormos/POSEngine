<div class="container my-5 p-4 card">
  
    <form id="qq" class="row g-2 align-items-center" method="post" action="{{route('addProduct-post')}}">
    <div class="d-flex mt-3 justify-content-start col-12"><p class="display-5 ">Add Product</p></div>





      @csrf
      <div class="col-md-4 form-floating">
        <input type="text" name="productName" class="form-control" id="name-input"  placeholder="neede for floating form">
        <label required for="name-input" >Product Name</label>{{-- you need placeholder and label to be down --}}
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>






      <div class="col-md-4 form-floating">
        <input type="number" step="1" name="baracode" class="form-control " id="baracode-input" placeholder="password" required>
        <label for="baracode-input" class="form-label">Baracode</label>
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>





       <div class="col-2 form-floating">    
        <input type="number" name="size" class="form-control " id="size-input"  placeholder="necessary for floating" required>
         <label for="size-input" class="form-label">Size</label>
         <div class="valid-feedback">
          Looks good!
        </div>
      </div>

































     <div class="fs-4 my-3 mt-5"> Choose Currency Base </div>

{{-- row --}}

<div id="currency-base-row" class="row">



{{-- first element in the row --}}
   <div id="dollar-fields" class="pb-4 d-flex flex-column justify-content-between  col-12 col-md-4  ">
     <h5 class="align-self-start flex-grow-0 my-3 fw-bold">Dollar-Based</h5> 
     <div id="Dollar-Based-Inputs"class="flex-grow-1 d-flex justify-content-between flex-column">

      <fieldset id="dollar-dollar" >
      <div class=" mb-5 form-floating">    
        <input type="number" step="0.001" name="dollar-dollar"class="form-control " id="dollar-dollar-input"  placeholder="necessary for floating" required>
         <label for="validationServer02" class="form-label">Dollar</label>
         <div id="dollar-dollar-feedback" class="valid-feedback">
          Looks good!
        </div>
      </div></fieldset>


      <fieldset  id="dollar-lira" >
       <div class="  form-floating">    
        <input type="text" name="dollar-lira"class="form-control " id="dollar-lira-input"  placeholder="necessary for floating" required>
         <label for="validationServer02" class="form-label">LBP</label>
         <div id="dollar-lira-feedback" class="invalid-feedback">
          Enter Only numbers!
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
<div id="lira-fields" class="d-flex flex-column justify-content-between col-12 col-md-4">



     <h5 class="align-self-start flex-grow-0 my-3 fw-bold">LBP-Based</h5> 
     <div id="Dollar-Based-Inputs"class="flex-grow-1 d-flex justify-content-between flex-column">

      <fieldset id="lira-lira" disabled="">
      <div class=" mb-5 form-floating">    
        <input type="text" class="form-control " name="lira-lira" id="lira-lira-input"  placeholder="necessary for floating" required>
         <label for="validationServer02" class="form-label">LBP</label>
         <div id="lira-lira-feedback" class="invalid-feedback">
          .
        </div>
      </div></fieldset></div>





</div>



      </div>



<input type="hidden" name="currency_base" value="dollar" id="currency_base-input">






































<fieldset >

<div class="fs-4 mt-4">Wholesale price</div>
<br>
      <div id="switch2-container" class="col-md-3">
      <label class="switch">
         <input id="switch2" type="checkbox" >
           <span class="slider round"></span>
      </label>
      </div> <br>
      <p style="color:#2196F3;">When the switch  is blue the price is in wholesale</p>

<div class="form-label">Profit Percentage</div>
      <div class="col-md-3">
            <div class=" mb-3 form-floating"> 
              <input  required disabled type="number" class="form-control" placeholder="necessary for floating" name="profit">
           <label  class="form-label">%</label>
           </div>
      </div>


  {{--hidden input     //change the value here will automaticlly
   change tghe default value of check and will config everything
    
  //because of a js script 
  --}}
  <input   type="hidden"  id="WholesaleFinal" name="WholesaleFinal" value="wholesale">
  {{----}}


<div class="form-check">
  <input disabled class="form-check-input" type="checkbox" value="" id="defaultProfit">
  <label class="form-check-label" for="flexCheckDefault">
    Use Default Profit Percentage*
  </label>
</div>

<p style="color:#222;">*When the above is checked the global dynamic profit percentage is used for this product
</p>


<div class="fs-4 my-4 mb-3">More Info</div>

      <div class="col-md-6">
        <label for="validationServer03" class="form-label">City</label>
        <input type="text" disabled class="form-control disabled " id="validationServer03" aria-describedby="validationServer03Feedback" required>
        <div id="validationServer03Feedback" class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>
 




      <div class="mt-2 col-md-5">
        <label for="categories" class="form-label">Catogery</label>
        <select class="form-select "  name="category"id="categories" aria-label="Default select example" aria-describedby="categoriesFeedback" required>
          <option value="" > </option>
        </select>
        <div id="categoriesFeedback" class="invalid-feedback">
          Please select a valid state.
        </div>
      </div>






      <div class="col-md-5">
        <label for="validationServer05" class="form-label">Brand</label>
        <select name="brand" type="text" class="form-select" id="brands" aria-describedby="validationServer05Feedback" >
        <option value="" > </option>
        </select>
        
        <div id="validationServer05Feedback" class="invalid-feedback">
          Please provide a valid zip.
        </div>
      </div>

        <button onclick="event.preventDefault();getBrands();getCategories()" class="mt-2 btn btn-primary">Refresh Categories and Brands</button>


</fieldset>



<div class="fs-4 my-4 mb-3">Group status</div>


<br>
      <div id="switch3-container" class="col-md-3">
      <label class="switch">
         <input id="switch3" type="checkbox" >
           <span class="slider round"></span>
      </label>
      </div> <br>

      {{-- use the search input here to enter baracodes--}}


<div class="container">


<div class="row">
<div class="col-8 ">
<div class=" input-group mb-3">
  <input  id="group-baracode-input" class="d-none" type="number" step="1" class="form-control" placeholder=" Enter a baracode" aria-label=" Enter a baracode" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button  id="add-btn" class="d-none btn btn-outline-secondary" type="button">Add</button>
 </div> </div>
</div>
</div>


  <input   type="hidden"  id="group-bool" name="group-boolean" value="false">
 
 <input   type="hidden"  id="group-baracodes" name="group-baracodes" value="">
 



<div class="row">
<div class="col-10 col-md-6 col-xxl-4 d-none" id="group-baracodes-table">
<table class="table border border-dark baracodes-table">
  <thead >
    <tr >
      <th class=" fs-6" scope="col">
      Baracodes
      <button class="btn-delete-all-custom btn btn-danger" onclick="event.preventDefault();deleteAllGroupsBaracode()">Delete ALL</button>
      </th>
           

    </tr>
  </thead>
  <tbody style="border-top:0;">


   
  </tbody>
</table>
</div>
</div>






</div>




   





      
     





      <div class="col-12">
        <button class="btn btn-dark fs-5" id="addProduct-submit" type="submit">Add</button>
      </div>
    </form>

</div>