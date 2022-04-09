@extends('layouts.layout-empty')


@section("css")
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">


   <!--   https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css  -->
<link rel="stylesheet" type="text/css" href="storage/DataTables/jqueryDataTablesCSS/css/jquery.dataTables.min.css"/>

<!-- https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css  -->
<link rel="stylesheet" type="text/css" href="storage/DataTables/jqueryDataTablesCSS/css/buttons.dataTables.min.css"/>

{{--custom css for the side panel for browsing the products--}}
@endsection





@section('content')
@csrf
@include('components.header')



<!--   The container of the Table   -->

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-12">





        
        <table class="  compact" id="allProductsDataTable">
        </table>





        </div><!---- close tage of .col-9   -->
    </div><!---- close tage of .row   -->
</div>

<div id="sidebar-loading"class="d-flex mt-4 justify-content-center">
<strong style="position:relative;top:2px;">Loading...</strong>
<div class="ms-5 spinner-border text-dark" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
</div>



@include('components.bootstrapModals')


@endsection







@section('js')

@php 
echo "<script> var allProducts = ".$allProducts.";</script>";
@endphp





@include("Ajax/viewAll/viewAll_script")


<script>
var dataForDataTable = [];
var allProducts_Keys = Object.keys(allProducts);
let max1 =30, ii;

allProducts_Keys.forEach((item, index)=>{

    let currentBaracodesGroup = allProducts[item][10];
    
    if(currentBaracodesGroup != null && currentBaracodesGroup != "null" && currentBaracodesGroup.length > max1){
      //allProducts[item][10] = addStr(currentBaracodesGroup, max1, "<br>");
       ii= 2;
       indexsToEdit = [];
        let xx =0 ;
        while (ii < currentBaracodesGroup.length){
           if(currentBaracodesGroup.charAt(ii) == ','){
               xx++;
               if (xx%2 == 0){
                   indexsToEdit.unshift(ii);
               }

               
           }
           ii++;
        }
        console.log(indexsToEdit);
        console.log(allProducts[item][0])
        indexsToEdit.forEach((item,index)=>{
            currentBaracodesGroup = addAtIndex(currentBaracodesGroup , item+1 , "\n");

        }
        
        )
        currentBaracodesGroup = currentBaracodesGroup.replace(/,/g , "  /  ");

        allProducts[item][10] = "<span title='"+currentBaracodesGroup+"'>group of barcodes</span>";
         
        /*let newRegExpContent = `.{`+(ii-)+`}`;
        let newRegExp = new RegExp(newRegExpContent,"g");

     // allProducts[item][10]  = currentBaracodesGroup.replace(/.{i}/g, '$&<br>');
      allProducts[item][10]  = currentBaracodesGroup.replace(newRegExp, '$&<br>');*/

      //console.log(newRegExp);
    }






	dataForDataTable[index]= ["<span id = '"+item +"'>"+item+"</span>",
                             allProducts[item][0] , 
                             allProducts[item][1], 
                             allProducts[item][2], 
                             allProducts[item][3], 
                             allProducts[item][4], 
                             allProducts[item][5],
                             allProducts[item][6], 
                             allProducts[item][7]+"-"+
                             allProducts[item][8], 
                             allProducts[item][9],
                             allProducts[item][10],
                             "<button id='button-"+item+"' class=\"btn btn-danger\" style='padding:4px 8px' onclick='funDelete("+item+")''>Delete </button>"
                             ];



})
</script>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/Public_jquery.min.js')}}"></script>





<!--https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js-->
<script type="text/javascript" src="/storage/DataTables/jqueryDataTablesJS/jquery.dataTables.min.js"></script>
<!--https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js-->
<script type="text/javascript" src="/storage/DataTables/jqueryDataTablesJS/dataTables.buttons.min.js"></script>
<!--https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js-->
<script type="text/javascript" src="/storage/DataTables/jszip/jszip.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.uikit.min.js"></script>
<script type="text/javascript" type="text/javascript" src="/storage/DataTables/pdfmake-unicode/pdfmake.min.js"></script>
<!--https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js  -->
<script type="text/javascript" src="/storage/DataTables/jqueryDataTablesJS/vfs_fonts.js"></script>

<!-- https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js   -->
<script type="text/javascript" src="/storage/DataTables/jqueryDataTablesJS/buttons.html5.min.js"></script>

<script>

 if($("#sidebar-loading").hasClass('d-none')){

    $("#sidebar-loading").addClass('d-flex');
    $("#sidebar-loading").removeClass('d-none');

   

    }




// removing the loading sign
 setTimeout(function(){
 	                        $("#sidebar-loading").addClass('d-none')
                             $("#sidebar-loading").removeClass('d-flex');
                                                  }, 5000);//wait 2 seconds







$(

    ()=>{
 if ( $.fn.dataTable.isDataTable( '#allProductsDataTable' ) ){
                tablexy.destroy();
                tablexy = {};
                $("#allProductsDataTable").html("")
            }





    tablexy = $('#allProductsDataTable').DataTable( {
        data: dataForDataTable,
         // "dom": 'Bfrtip',
        "scrollY":        "60vh",
        "scrollCollapse": false,
        "paging":         false,
        "scrollX":true,
        pageLength: 8,// scrollY: true,
        
       
       
        columns: [
            { title: "id" ,"width": "5%" },
            { title: "Product Name" ,"width": "15%" },
            { title: "Barcode" ,"width": "10%" },
            { title: "Unit Price" ,"width": "7.5%" },
            { title: "Currency Base ","width": "7.5%"  },
            { title: "Profit Percentage","width": "7.5%"  },
            { title: "Profit Type","width": "7.5%"  },
            { title: "Size" ,"width": "5%" },
            { title: "Cat-Brand" ,"width": "5%" },
            { title: "Group State" ,"width": "15%" },
            { title: "Group Barcodes","width": "5%" },
            { title: "Added At","width": "10%" }
            
        ],
   

         dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
             {
                        "extend": "pdf",
                        "text": "Export as PDF",
                        "filename": "Report Name",
                        "className": "btn btn-green",
                        "charset": "utf-8",
                        "bom": "true",
                        init: function(api, node, config) {
                            $(node).removeClass("btn-default");
                        }
                    }
        ]

       


    } );
    
    })
</script>














<!--   Creating the dataTable object of all the products--->




@endsection