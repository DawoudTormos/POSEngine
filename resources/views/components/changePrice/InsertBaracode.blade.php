
<div id="card1" class="card col-12 mt-4 d-flex flex-column align-content-center">
<h3 class=" my-3 fw-bold align-self-center"> Scan the Barcode and Hit Enter</h3>
<form method="POST"  style="top:-2px;" class=" mb-4 mx-auto main-search-input-wrap clearfix" id="baracodeForm" action="{{--usless now with event.preventDefault.;--}}" >
         <div class="main-search-input fl-wrap">
             <div class="main-search-input-item"> 
              @csrf 
               <input type="text" class="border border-dark" name="baracode" id="submitBaracode"  accesskey="w"  placeholder="Enter Barcode"> 
                </div> 
               <input class="main-search-button" name="submit" id="search-button"  type="submit" >
         </div>
     </form>
</div>