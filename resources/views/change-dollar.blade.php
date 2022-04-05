@extends('layouts/layout')

@section('content')

@include('components.header')
@include('components.dollar-input')

@include('components.bootstrapModals')
@endsection

@section('javascript')
<script>
$($('#dollarPrice').html(addCommas($('#dollarPrice').html()))
)



$("title").html("Edit Global Variables");
</script>
@include('Ajax.Ajax3')
@endsection