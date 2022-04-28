
{{-- modal popup--}}
<!-- Button trigger modal -->
<button hidden type="button" id="xhrButton"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#xhr">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="xhr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="xhrBody" class="modal-body">
        Please Choose a Product First
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
        {{--<button type="button" class="btn btn-primary">Understood</button>--}}
      </div>
    </div>
  </div>
</div>


{{----}}











{{-- modal popup--}}
<!-- Button trigger modal -->
<button hidden type="button" id="csrf1Button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#csrf1">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="csrf1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><span class="text-warning">Alert</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="csrf1Body" class="modal-body">
        Please refresh this page in less than 1 hour.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
        <button onclick="window.location.reload(true);" type="button" class="btn btn-primary">Refresh Now</button>
      </div>
    </div>
  </div>
</div>


{{----}}














{{-- modal popup--}}
<!-- Button trigger modal -->
<button hidden type="button" id="csrf2Button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#csrf2">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="csrf2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><span class="text-warning">Alert!</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="csrf2Body" class="modal-body">
        Please refresh this page in less than 45 minutes.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
        <button onclick="window.location.reload(true);" type="button" class="btn btn-primary">Refresh Now</button>
      </div>
    </div>
  </div>
</div>


{{----}}








{{-- modal popup--}}
<!-- Button trigger modal -->
<button hidden type="button" id="csrf3Button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#csrf3">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="csrf3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><span class="text-danger">Alert!!!!</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="csrf3Body" class="modal-body text-danger">
        Please refresh this page in less than 20 minutes.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
        <button onclick="window.location.reload(true);" type="button" class="btn btn-primary">Refresh Now</button>
      </div>
    </div>
  </div>
</div>


{{----}}



































{{---  custom bootstrap modal for getting a product byb baracode   ---}}
{{-----}}
{{-----}}
{{-----}}
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#findByBaracodeModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="findByBaracodeModal" tabindex="-1" aria-labelledby="findByBaracodeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl"> {{-- This line is changed from other modal so it is vertically centered--}}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="findByBaracodeModalLabel">Find Product By Baracode</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      





     <div class="row d-flex searchbar-container justify-content-between mb-3">
     

   <form style="margin:0;" method="GET" class="main-search-input-wrap clearfix" id="getProductInModalByBaracode" action="{{route('products-post')}}{{--usless now with event.preventDefault.;--}}" >
     <div class="main-search-input fl-wrap">
         <div class="main-search-input-item"> 
          @csrf 
           <input type="text" name="name" id="inputBaracodeInModal" class="border border-dark" accesskey="w" value="" placeholder="Enter Baracode..."> 
            </div> 
           <input class="main-search-button" name="submit" value="Get Product" id="search-button"  type="submit" >
     </div>
 </form>


</div>


<table id="tableInModal" class="table table-bordered  ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Baracode</th>
      <th scope="col">Category</th>
      <th scope="col">Brand</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Currency</th>
      <th scope="col">View Product</th>

    </tr>
  </thead>
  <tbody>
  <tr>
     <td scope="col">ID</td>
      <td scope="col">Product Name</td>
      <td scope="col">Baracode</td>
      <td scope="col">Category</td>
      <td scope="col">Brand</td>
      <td scope="col">Unit Price</td>
      <td scope="col">Currency</td>
</tr>


<tr>
       <td scope="col">ID</td>
      <td scope="col">Product Name</td>
      <td scope="col">Baracode</td>
      <td scope="col">Category</td>
      <td scope="col">Brand</td>
      <td scope="col">Unit Price</td>
      <td scope="col">Currency</td>
</tr>

  </tbody>
</table>












      </div>
      <div class="modal-footer">
        <button type="button" id="closeFindByBaracodeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>





{{-----}}
{{-----}}
{{-----}}