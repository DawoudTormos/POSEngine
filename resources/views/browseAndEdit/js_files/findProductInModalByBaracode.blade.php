	<script>
    

    $(
    $(document).on('submit', '#getProductInModalByBaracode', function (event) {
    
     event.preventDefault(); 


    $.ajax({
       url : '{{route("getProduct-post-Unrestricted")}}', //PHP file to execute
       type : 'POST', //method used POST or GET
       data : {_token :  $("input[name='_token']").val(),
                baracode :$("#inputBaracodeInModal").val()
       
                }, 
       success : function(data){ // Has to be there !
         $("#tableInModal tbody ").empty();
        let result = JSON.parse(data);
        let string;

       result.forEach((item,index)=>{

          

          string += '<tr id="'+item.id+'"><td scope="col">'+item.id+'</td><td>'+item.product_name+'</td><td>'+item.baracode+'</td><td>'+getCatNameById(item.category_id)+'</td><td>'+getBrandNameById(item.brand_id)+'</td><td>'+item.unit_price+'</td><td>'+item.currency_base+'</td>'+'<td><button class="btn btn-dark" onclick="fun6('+item.category_id+','+item.brand_id+','+item.id+');$(\'#closeFindByBaracodeModal\').click();">view Product</button></td>';
       })
                    $("#tableInModal tbody ").append(string);



       },

      error:  function (xhr , status , error) {
        @include("errors/error-xhr-modals")
         }

    })
    })
    )

    	</script>
