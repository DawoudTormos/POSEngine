 <form method="POST" class="main-search-input-wrap clearfix" id="search_form" action="{{route('products-post')}}{{--usless now with event.preventDefault.;--}}" >
     <div class="main-search-input fl-wrap">
         <div class="main-search-input-item"> 
          @csrf 
           <input type="text" name="name" id="input1" size="30" accesskey="w" value="123" placeholder="Search Products..."> 
            </div> 
           <input class="main-search-button" name="submit" id="search-button"  type="submit" >
     </div>
 </form>
 