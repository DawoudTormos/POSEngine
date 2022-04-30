<div class="container-fluid ">
    
    <div class="row mx-3 justify-content-between">


        <div class="col-3 my-5 mx-0 px-0 card rounded-0 border border-2  border-secondary"
             style="overflow-y:scroll     height: calc(63px + 86vh) !important;"
             id="sideBarContainer">
        @include('browseAndEdit.browseProducts')
        </div>


        <div class="col-9 my-5 pt-2 mx-0 p-4 card rounded-0 border border-2 border-secondary border-start-0" id="editProductFormContainer">
        @include('browseAndEdit.editProductForm')
        </div>

 
    </div>
</div>



@include('components.bootstrapModals')


<a onclick="" id="floatButton" class="float">
<i accesskey="p" id="floatButton-i" class="fa fa-lg fa-pause my-float" title="Alt+P"></i>
</a>


{{-- whenever the find button is clicked the form is submitted as seen below so the results are up to date with what have edited--}}
<a onclick="$('#getProductInModalByBaracode').submit();" id="floatButton2" class="d-flex align-items-center justify-content-center float_2"
 data-bs-toggle="modal" data-bs-target="#findByBaracodeModal"
>

<span style="font-size:16px;display:block">Find</span>   

</a>