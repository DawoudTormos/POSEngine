
    @extends('layouts.layout2')



@section('css')

 <link href="{{ asset('css/add-product.css') }}" rel="stylesheet">
 <link href="{{ asset('css/search-bar.css') }}" rel="stylesheet">
 <link href="{{ asset('css/switchToggle.css') }}" rel="stylesheet">
 <link href="{{ asset('css/floatPauseButton.css') }}" rel="stylesheet">
<link href="{{ asset('css/fixedTable.css') }}" rel="stylesheet">

<!-- overeriding the fixedTable.css to my needs  --->
<!--start-->
<style>
.table-fixed tbody {
    height: 400px !important;
    overflow-y: scroll;
    width: 100%;
}

.table-fixed td ,.table-fixed th {
text-align: left !important;
}

</style>
<!--end-->

@endsection





@section('content')
@include('components.header')

<div class="container-fluid px-4 mx-3 mt-4">

<div class="row justify-content-around">











<div class=" col-12 col-lg-5   px-4 my-2  align-self-center mx-4 card ">
     







     <div class="h2 col-12  my-3 mt-4">Categories</div> <!--- col-12 is used here to give the width:100% property -->
     
     <form method="POST"  style="top:-2px;" class="  col-6    clearfix" id="addCategoryForm" action="{{route('ChangeDollar')}}{{--usless now with event.preventDefault.;--}}" >
         <!--- col-12 is used up to give the width:100% property -->
         <div class="main-search-input fl-wrap" style="border:1px solid #000">
             <div class="main-search-input-item"> 
              @csrf 
               <input type="text" name="addCategory" id="addCategory"  accesskey="w"  placeholder="Enter New Category"> 
                </div> 
               <input class="main-search-button" name="submit" id="search-button"  type="submit" value="Add" >
         </div>
     </form>


     








   
 <div id="catsTableContainer" class="table-responsive">
                    <table id="catsTable" class="table table-fixed display"  width="100%">
                        <thead>
                            <tr style="display:block;padding-right:17px;">
                                <th scope="col" width="15%">#ID</th>
                                <th scope="col" width="50%">Name</th>
                                <th scope="col" width="35%">Count</th>
                                

                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- End -->











</div>
















<div class=" col-12 col-lg-5   px-4 my-2  align-self-center mx-4 card ">
     







     <div class="h2 col-12  my-3 mt-4">Brands</div> <!--- col-12 is used here to give the width:100% property -->
     
     <form method="POST"  style="top:-2px;" class="  col-6    clearfix" id="addBrandForm" action="{{route('ChangeDollar')}}{{--usless now with event.preventDefault.;--}}" >
         <!--- col-12 is used up to give the width:100% property -->
         <div class="main-search-input fl-wrap" style="border:1px solid #000">
             <div class="main-search-input-item"> 
              @csrf 
               <input type="text" name="addBrand" id="addBrand"  accesskey="w"  placeholder="Enter New Category"> 
                </div> 
               <input class="main-search-button" name="submit" id="search-button"  type="submit" value="Add" >
         </div>
     </form>


     








   
 <div id="brandsTableContainer" class="table-responsive">
                    <table id="brandsTable" class="table table-fixed display"  width="100%">
                        <thead>
                            <tr style="display:block;padding-right:17px;">
                                <th scope="col" width="15%">#ID</th>
                                <th scope="col" width="50%">Name</th>
                                <th scope="col" width="35%">Count</th>
                                

                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- End -->











</div>

















</div>

 </div>


@include('components.bootstrapModals')

@endsection


@section("javascript")
@include('js_files.checkIfDesktop')
@include('addCategoriesBrands.Ajax')
@include('addCategoriesBrands.js_scripts')

<script>
if( $.browser.device == true){
      $(".table-fixed thead tr").css('padding-right','0px');

 }else{
      $(".table-fixed thead tr").css('padding-right','17px');
 }
 </script>
@endsection
@php


@endphp