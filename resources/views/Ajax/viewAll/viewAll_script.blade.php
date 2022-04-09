<script>


/// The parameter named xenu is the id 
var funDelete = (idToDelete)=>{

     $("#button-"+idToDelete).css("cursor" , "wait");


    $.ajaxSetup({
        beforeSend: function(xhr) {
            xhr.setRequestHeader('Csrf-Token', $("input[name='_token']").val());
        }
    });
// HERE
 
 $.ajax({
    url: "{{route('deleteProduct')}}",
    type: 'post',
    data : {id :idToDelete, _token : $("input[name='_token']").val()},
    //contentType : 'application/json',
    success: function (data) {  
        if(data == "Deleted Succesfully!"){

            $("#"+idToDelete).closest("tr").attr('style', 'background-color: #ee8080 !important');
            $("#button-"+idToDelete).attr('disabled', '');
            $("#button-"+idToDelete).removeClass("btn-danger");
            $("#button-"+idToDelete).css("cursor" , "not-allowed");

            $("#"+idToDelete).html("<span class=' fw-bold text-danger'>Deleted<span>");
        }

    },
        
        
        
        
        
    error:  function (xhr , status , error) {
    @include("errors/error-xhr-modals")
     }
        });

}

function addAtIndex(str, index, stringToAdd){
  return str.substring(0, index) + stringToAdd + str.substring(index, str.length);
}

</script>