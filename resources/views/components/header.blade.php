
@php
$tabs = ["POS","Pricing"] ;
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="container-fluid">


    <a class="navbar-brand" style="font-size:1.5rem; position:relative; top:0px; padding-bottom:12px; margin-right:40px; margin-left:7px" href="#" >
    {{ config('app.name') }}
    <div style="position:absolute; bottom:0px; right:-17px; font-size:0.5em">
    by Dawoud Tormos
    </div>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">





       
       
        @foreach($tabs as $tab)
        <li id="{{$tab}}" class="nav-item">
<a class="nav-link active mx-3" target="_blank"aria-current="page" href="#">
{{$tab}}</a></li>
          
        @endforeach








        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mx-3" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventory
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" target="_blank" href="{{route('AddProduct')}}">Add Product</a></li>
           <li><a class="dropdown-item"  target="_blank" href="{{route('editProductInfo')}}">View Invetory</a></li>
            <li><a class="dropdown-item" target="_blank" href="{{route('viewAll')}}">View ALL Products</a></li>

          </ul></li>









      
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mx-3" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" target="_blank" href="{{route('ChangeDollar')}}">Edit global variables</a></li>
        <li><a class="dropdown-item" target="_blank" href="{{route('addCategoriesBrands')}}">Add Categories/Brands</a></li>
        
          </ul></li>











      </ul>
    </div>


    </div>
</nav>
