
@php
$tabs = ["POS","Pricing"] ;
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="container-fluid">


    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        @php
          
        @endphp
        @foreach($tabs as $tab)
        <li id="{{$tab}}" class="nav-item">
<a class="nav-link active mx-3" aria-current="page" href="#">
{{$tab}}</a></li>
          
        @endforeach

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mx-3" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventory
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('AddProduct')}}">Add Product</a></li>
           <li><a class="dropdown-item" href="{{route('editProductInfo')}}">View Products</a></li>
          </ul>


      
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mx-3" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('ChangeDollar')}}">Edit global variables</a></li>
        <li><a class="dropdown-item" href="{{route('addCategoriesBrands')}}">Add Categories/Brands</a></li>
        
          </ul>











      </ul>
    </div>


    </div>
</nav>
