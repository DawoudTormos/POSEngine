<script>








let currentTbody;




var updateTables = ()=>{
    $("#catsTable tbody").empty();
            currentTbody ='';
            catIDs.forEach((item, index)=>{
	        currentTbody+='<tr id="'+item+'"><td scope="col" width="15%">'+item+'</td><td scope="col" width="50%">'+catNames        [index]+'</td><td scope="col" width="35%">'+catCounts[index]+"</td>";

             })
             $("#catsTable tbody").html(currentTbody);



            $("#brandsTable tbody").empty();
            currentTbody ='';
            brandIDs.forEach((item, index)=>{
	        currentTbody+='<tr id="'+item+'"><td scope="col" width="15%">'+item+'</td><td scope="col" width="50%">'+brandNames[index]+'</td><td scope="col" width="35%">'+brandCounts[index]+"</td>";

             })
             $("#brandsTable tbody").html(currentTbody);

}


updateTables();


var updateArrays = ()=>{


 var token =  $('input[name="_token"]').attr('value')
       var potato = {_token : token}
     // LOOK AT ME! BETWEEN HERE AND 
   
        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Csrf-Token', token);
            }
        });
    // HERE   // don't remove
     
     $.ajax({
        url: '{{ route("addCategoriesBrands")}}',
        type: 'post',
        data : potato,
        //contentType : 'application/json',
        success: function (data) {  

            let responseArray = JSON.parse(data);
             catNames = responseArray[0];
             catIDs = responseArray[1];
             catCounts = responseArray[2];
             brandNames = responseArray[3];
             brandIDs = responseArray[4];
             brandCounts = responseArray[5];



             updateTables();





            },
        
        
        
        
        
        error:  function (xhr , status , error) {
            @include("errors/error-xhr-modals")
              
         }
            });






    $("#catsTable tbody").empty();
    currentTbody ='';
    catIDs.forEach((item, index)=>{
	currentTbody+='<tr id="'+item+'"><td scope="col" width="15%">'+item+'</td><td scope="col" width="50%">'+catNames[index]+'</td><td scope="col" width="35%">'+catCounts[index]+"</td>";

    })
    $("#catsTable tbody").html(currentTbody);


}







</script>