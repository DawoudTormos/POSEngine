
    
@extends('layouts.Layout')



@section("section1")


@include('components.header')

@include('tools.check_method')

@include('components.search-bar')
@endsection
@section('javascript')
<script id="js-script">
$('#POS').children('a').attr("href","products-post");
</script>


@endsection
