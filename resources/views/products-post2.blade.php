
@extends('layouts.layout2')


@section('css')
 <link href="{{ asset('css/product-card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search-bar.css') }}" rel="stylesheet">
@endsection

@section("section1")

    
<!-- post "</h1> <script>alert('200');</script> <h1>" in the serach bar to do a simple hack -->
@include('components.header')

@include('tools.check_method')

@include('components.search-bar2')

<div class="container-fluid mx-auto ">
<div class="row justify-content-around">






   <div class="card mx-auto px-0 mx-md-1 col-md-5 col-lg-3  col-xl-2  col-10 mt-5">
     <img class="mx-auto img-thumbnail" src="https://i.imgur.com/TVAbVOO.png"  height="auto" />
        <div class="card-body text-center ">
            <div class="cvp">
                <h5 class="card-title font-weight-bold">Yail wrist watch</h5>
                <p class="card-text">$299</p> <a href="#" class="btn details px-auto">view details</a><br /> <a href="#" class="btn cart px-auto">ADD TO CART</a>
            </div>
        </div>
    </div>



    <div class="card mx-auto px-0 mx-md-1 col-md-5 col-lg-3  col-xl-2  col-10 mt-5">
     <img class="mx-auto img-thumbnail" src="https://i.imgur.com/TVAbVOO.png"  height="auto" />
        <div class="card-body text-center ">
            <div class="cvp">
                <h5 class="card-title font-weight-bold">Yail wrist watch</h5>
                <p class="card-text">$299</p> <a href="#" class="btn details px-auto">view details</a><br /> <a href="#" class="btn cart px-auto">ADD TO CART</a>
            </div>
        </div>
    </div>





    <div class="card mx-auto px-0  mx-md-1 col-md-5 col-lg-3  col-xl-2  col-10 mt-5">
     <img class="mx-auto img-thumbnail" src="https://i.imgur.com/TVAbVOO.png"  height="auto" />
        <div class="card-body text-center">
            <div class="cvp">
                <h5 class="card-title font-weight-bold">Yail wrist watch</h5>
                <p class="card-text">$299</p> <a href="#" class="btn details px-auto">view details</a><br /> <a href="#" class="btn cart px-auto">ADD TO CART</a>
            </div>
        </div>
    </div>


<div class="card mx-auto px-0 mx-md-1 col-md-5 col-lg-3  col-xl-2  col-10 mt-5">
     <img class="mx-auto img-thumbnail" src="https://i.imgur.com/TVAbVOO.png"  height="auto" />
        <div class="card-body text-center ">
            <div class="cvp">
                <h5 class="card-title font-weight-bold">Yail wrist watch</h5>
                <p class="card-text">$299</p> <a href="#" class="btn details px-auto">view details</a><br /> <a href="#" class="btn cart px-auto">ADD TO CART</a>
            </div>
        </div>
    </div>










    </div>
</div>


@endsection




@section('javascript')
@include('Ajax/Ajax2')


@endsection