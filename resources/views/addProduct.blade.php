@extends('layouts.layout2')




@section('css')
 <link href="{{ asset('css/add-product.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search-bar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/switchToggle.css') }}" rel="stylesheet">

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
</style>

@endsection




@section('content')

@include('components.header')
{{--
@include('tools.check_method')
--}}

@include('components.addProductForm')




@endsection



@section('javascript')

@include('js_files.addProduct')
<script>
const page = "addProduct";

@include('js_files.getBrands')
@include('js_files.getCategories')

getCategories();
getBrands();


$("title").html("Add Product");
$("#switch2").click();
</script>

@endsection
