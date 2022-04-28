@extends('layouts.layout2')




@section('css')
 <link href="{{ asset('css/add-product.css') }}" rel="stylesheet">
 <link href="{{ asset('css/search-bar.css') }}" rel="stylesheet">
 <link href="{{ asset('css/switchToggle.css') }}" rel="stylesheet">
 <link href="{{ asset('css/floatPauseButton.css') }}" rel="stylesheet">
<link href="{{ asset('css/fixedTable.css') }}" rel="stylesheet">
<!--<link rel="stylesheet" type="text/css" href="/storage/DataTables/datatables.min.css"/>
-->


<!--   https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css  -->
<link rel="stylesheet" type="text/css" href="storage/DataTables/jqueryDataTablesCSS/css/jquery.dataTables.min.css"/>

<!-- https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css  -->
<link rel="stylesheet" type="text/css" href="storage/DataTables/jqueryDataTablesCSS/css/buttons.dataTables.min.css"/>

{{--custom css for the side panel for browsing the products--}}
<style>

  .baracodes-table thead tr th{
       display: flex;
    justify-content: space-between;
    align-items: center;
  }
 .btn-delete-custom{
padding:3px 6px;
}
 .btn-delete-all-custom{
padding:3px 6px;
   
}
.accordion-button-custom{
 padding:0.8rem 1.45rem !important;
 text-align:center;
 justify-content:center;
}

.accordion-button{
    background-color:#fff;
    
}
#mainContainer{
    height:86vh;
    max-height:86vh;
    

}
.tabA{
    font-weight: 600 !important;
    font-size: 16px !important;
    color: #000 !important;


}
.td-class{
    display:flex !important;
    align-items:center;
    justify-content:center;
}
.td-class .btn{
    padding:4px 12px !important;
}
.categoryName{
    
}


.baracodes-table tbody tr td button{
padding:3px 6px;
}
 .baracodes-table tbody tr td{
     display:flex;
     align-items:center;
     justify-content:space-between;
 }
 #group-baracodes-table table tbody{
     display:block;
     height:200px;
     overflow-y:scroll;
 }

  #group-baracodes-table table tbody tr {
      display:block;
      width:100%;


  }
  #group-baracodes-table table tbody td { padding:5px 11px}

  #tableInModal tr td{
      
     max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
</style>


{{----}}
@endsection




@section('content')

@include('components.header')
{{--
@include('tools.check_method')
--}}

@include('browseAndEdit.editProductContainer')




@endsection



@section('javascript')

@include('js_files.addProduct')
@include('js_files.checkIfDesktop')
<script>
let tempCat ,tempBrand , currentProductSavedBool = true;
$("#qq").hide();
const page = "editProductInfo";
{{'var dollarRate = '.$dollarRate}}
window.scrollTo(0,90);
@include('js_files.floatPauseButton')

var height;





window.addEventListener("resize", () => {
		height =$("#editProductFormContainer").outerHeight();
$("#sideBarContainer").outerHeight(height);

height = $("#tableContainer").outerHeight();
$(".table-fixed tbody ").outerHeight(height - 50);
});


if( $.browser.device == true){
      $(".table-fixed thead tr").css('padding-right','0px');

 }else{
      $(".table-fixed thead tr").css('padding-right','17px');
 }

 
$("title").html("Inventory");
</script>


 


@include('browseAndEdit.js_files.modified-getProductsandBrands')
@include('browseAndEdit.js_files.editProductScripts')
@include('browseAndEdit.Ajax_updateProductInfo')

<!--<script type="text/javascript" src="/storage/DataTables/datatables.min.js"></script>
-->

<!--https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js-->
<script type="text/javascript" src="/storage/DataTables/jqueryDataTablesJS/jquery.dataTables.min.js"></script>
<!--https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js-->
<script type="text/javascript" src="/storage/DataTables/jqueryDataTablesJS/dataTables.buttons.min.js"></script>
<!--https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js-->
<script type="text/javascript" src="/storage/DataTables/jszip/jszip.min.js"></script>

<script type="text/javascript" src="/storage/DataTables/pdfmake-unicode/pdfmake.min.js"></script>
<!--https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js  -->
<script type="text/javascript" src="/storage/DataTables/jqueryDataTablesJS/vfs_fonts.js"></script>

<!-- https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js   -->
<script type="text/javascript" src="/storage/DataTables/jqueryDataTablesJS/buttons.html5.min.js"></script>

<script>
$("li#POS a").attr("href" , "/products-post");
$("li#Pricing a").attr("href" , "/changePrice");

</script>
@include('browseAndEdit.js_files.findProductInModalByBaracode')

@endsection
