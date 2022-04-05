if(typeof err === "undefined"){
                     $("#xhrBody").html("Error message:<span class='text-danger'> \"" + "No Response From Server"+"\"</span><br>"+"status: "+"500" + " "+"net::ERR_CONNECTION_REFUSED"+"<span class='text-danger'><br><br>PLEASE Contact The Developer!</span>");
                         if($("#xhr").hasClass('show') == false){
              $("#xhrButton").click();
        }
                }

             var err = eval("(" + xhr.responseText + ")");
             console.log(err);
              //alert("error:" + err.message+"\n"+"status:"+status + "\n"+error);
              $("#xhrBody").html("Error message:<span class='text-danger'> \"" +err.message+"\"</span><br>File Path: <span class='text-primary'>"+err.file+"</span><br>Status: "+status + "<br>Type: "+error+"<span class='text-danger'><br><br>PLEASE Contact The Developer!</span>");
              if(err.message == "CSRF token mismatch."){
                  $("#xhrBody").append("<br><br><span class='text-success'>Probable Solution : refresh the page and repeat the action you did before getting the error.</span>");
              }
              if($("#xhr").hasClass('show') == false){
              $("#xhrButton").click();
        }