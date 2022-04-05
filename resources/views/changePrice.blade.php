@extends('layouts.layout')



@section('css')
 <link href="{{ asset('css/add-product.css') }}" rel="stylesheet">
    <style>
    
    .fw-500{
        font-weight:500;
    }
    </style>
@endsection






@section('content')

@include('components/header')

<div class="container"><div class="row">

@include('components.changePrice.insertBaracode')   

@include('components.changePrice.editPrice')   

</div></div>
@include('components.bootstrapModals')
@endsection







@section('javascript')
<script>

{{ "var dollarRate=".$dollarRate}}
 {{ "var globalProfit=".$globalProfit}}

 @include('js_files.getBrands')
@include('js_files.getCategories')


$("title").html("Pricing");
</script>
@include('components.changePrice.Ajax')  
@endsection